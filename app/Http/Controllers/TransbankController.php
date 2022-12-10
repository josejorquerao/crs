<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Compra;
use App\Models\Cottage;
use app\Models\Booking;
use App\Models\Detail;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\Auth;

class TransbankController extends Controller
{
    protected $data;

    public function construct(){
        if(app()->environment('production')){
            WebpayPlus::configureForProduction(
                env('webplay_plus_cc'),
                env('webplay_plus_api_key')
            );
        }else{
            WebpayPlus::configureForTesting();
        }
    }
    public function start(Request $request){
        $compra=new Compra();
        //se debe incluir despues de q se corriguen las tablas
       $id=self::setData($request);  
        $compra->session_id=$id;
        $compra->total=$request->totalmonto;
        $compra->save();
        $url=self::start_transaction($compra);
        return redirect($url);
    }
    public function start_transaction($compra){
        $transaction=(new Transaction)->create(
            $compra->id,
            $compra->session_id,
            $compra->total,
            route('confirmar_ok')
        );
        $url=$transaction->getUrl().'?token_ws='.$transaction->getToken();
        return $url;
    }
    public function peticionCompra(Request $request){
        $token = $request->token_ws;
        $transaction = new Transaction();
        $status = $transaction->commit(
            $token,
            );
        $compra = Compra::where('id',$status->buyOrder)->first();
        $transaction->status($request->token_ws);
        $estado=0;
        if($status->isApproved()){
            $compra->status=2;
            $compra->update();
            $estado=1;
            $id=Reservation::max('id');
            $booking=Reservation::where('id',$id)->first();
            $booking->status="1";
            $booking->update();
            $cottage=Cottage::find($booking->cottage_id);
            if($booking->users_id==1){
                $user=$booking->guest;
            }else{
                $user=User::find($booking->users_id);
            }
           //retorna la rutaaas
            return view('transbank.response' ,compact('estado','booking','compra','user','cottage'));
        }else{
            return view('transbank.response',compact('estado'));
        }
    }
    public function testing(Request $request){
        return 'HOLA MUNDO';
    }
    //funcion para guardar los datos correspondientes segun la transaccion
    public function SetData(Request $request){
        $detail=new Detail();
        $detail->cottage_id=$request->cottageId;
        $detail->total=$request->totalmonto;
        $detail->timestamps = false;
        $detail->save();
        $id=Detail::max('id');
        $booking=new Reservation();
        $booking->ingress=$request->ingress;
        $booking->egress=$request->egress;
        if($request->user==null){
            $booking->users_id=1;
            $guest=new Guest();
            $guest->name=$request->name;
            $guest->email=$request->email;
            $guest->lastname=$request->lastname;
            $guest->save();
            $booking->guest_id=Guest::max('id');
        }else{
            $booking->users_id=$request->user;
            $booking->guest_id=1;
        }
        $detail->save();
        $id=Detail::max('id');
        $booking->detail_id=$id;
        $booking->status="0";
        $booking->city=$request->city;
        $booking->cottage_id=$request->cottageId;
        $booking->save();
        return $id;
    }
    public function showStatus(){
        return view('transbank.response');
    }
}
