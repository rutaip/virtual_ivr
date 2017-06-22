<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use MP;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderDelivery;


class MPagoController extends Controller
{

    public function index(){

    }

    public function create(){
        return view('store.create');
    }



    public function confirmation(Request $request){

        $mp = new MP(env('MERCADOPAGO_USER'), env('MERCADOPAGO_PASS'));


        $topic = $request->topic;
        $merchant_order_info = null;

        switch ($topic) {
            case 'payment':
                $payment_info = $mp->get("/collections/notifications/".$request->id);
                $merchant_order_info = $mp->get("/merchant_orders/".$payment_info["response"]["collection"]["merchant_order_id"]);
                break;
            case 'merchant_order':
                $merchant_order_info = $mp->get("/merchant_orders/".$request->id);
                break;
            default:
                $merchant_order_info = null;
        }

        if($merchant_order_info == null) {
            echo "Error obtaining the merchant_order";
            die();
        }

        if ($merchant_order_info["status"] == 200) {

            //Mail::to('erick.nava@fastcode.today')->send(new OrderDelivery());

            Log::info($merchant_order_info["response"]["payments"]);
            Log::info($merchant_order_info["response"]["shipments"]);
        }


    }


}

