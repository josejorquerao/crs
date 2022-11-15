<?php

namespace App\Http\Controllers;

use App\Models\Compra;
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
        $compra->session_id='123123';
        $compra->total=10000;
        $compra->save();
        $url=self::start_transaction($compra);
        return $url;
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
        $status=(new Transaction)->commit($request->get('token_ws'));
        $compra = Compra::where('id',$status->buyOrder)->first();
        if($status->isApproved()){
            $compra->status=2;
            $compra->update();
            return redirect(env('http://127.0.0.1:8000')."?compra_id={$compra->id}");
        }else{
            return redirect(env('http://127.0.0.1:8000')."?compra_id={$compra->id}");
        }
    }
    public function testing(Request $request){
        return 'HOLA MUNDO';
    }
}
