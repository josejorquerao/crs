<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Cottage;
use app\Models\Booking;
use App\Models\Detail;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{
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
            //dd($status);
            $compra->status=2;
            $compra->update();
            $estado=1;
           // $booking=Booking::max('id');
           // $booking->status="Pago Aceptado";
           //$booking->update();
           //retorna la rutaaas
            return view('transbank.response' ,compact('estado'));
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
        // $booking=new Booking();
        // $booking->ingress=$request->ingress;
        // $booking->detail_id=$id;
        // $booking->egress=$request->egress;
        // $booking->user_id=0;
        // $booking->guest_id=0;
        // $booking->status="Pendiente Pago";
        // $booking->save();
        return $id;
    }
    public function showStatus(){
        return view('transbank.response');
    }
}
