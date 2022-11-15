<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\Transaction;
use app\Models\Compra;

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
        return $request;
    }
    public function testing(Request $request){
        return 'HOLA MUNDO';
    }
}
