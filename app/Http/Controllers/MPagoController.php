<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;
use Illuminate\Support\Facades\Mail;
use App\Payment;
use App\UserBalance;
use App\Order;
use App\User;
use Carbon\Carbon;
use App\Mail\OrderConfirmation;


class MPagoController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('store.create');
    }

    public function success()
    {

        flash('Pago exitoso!', 'success');

        return view('store.confirmation');
    }

    public function pending()
    {
        return view('store.pending');
    }

    public function denied()
    {
        return view('store.denied');
    }


    public function confirmation(Request $request)
    {

        $mp = new MP(env('MERCADOPAGO_USER'), env('MERCADOPAGO_PASS'));


        $topic = $request->topic;
        $merchant_order_info = null;

        switch ($topic) {
            case 'payment':
                $payment_info = $mp->get("/collections/notifications/" . $request->id);
                $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
                break;
            case 'merchant_order':
                $merchant_order_info = $mp->get("/merchant_orders/" . $request->id);
                break;
            default:
                $merchant_order_info = null;
        }

        if ($merchant_order_info == null) {
            echo "Error obtaining the merchant_order";
            die();
        }

        if ($merchant_order_info["status"]== 200) {


            $order = Order::where('order', $merchant_order_info["response"]["external_reference"])
                ->first();
            $user_owner = User::where('id', $order->user_id)->first();

            if($merchant_order_info["response"]["payments"]['0']['status'] == 'approved'){
                $payment=Payment::firstOrCreate(['transaction_id' => $merchant_order_info["response"]["preference_id"]],
                    ['user_id' => $user_owner->id,
                        'payment_method' => 'MercadoPago',
                        'amount' => $order->amount,
                        'status' => '2',
                        'transaction_id' => $merchant_order_info["response"]["preference_id"],
                        'order_id' => $merchant_order_info["response"]["external_reference"]
                    ]);

                $order->status = '2';
                $order->save();


                $user_balance = UserBalance::firstOrNew(['user_id' => $payment->user_id]);

                if ($user_balance->exists) {
                    $user_balance->update([
                        'balance' => $user_balance->balance + $payment->amount,
                        'expiration' => Carbon::now('America/Mexico_City')->addYear()
                    ]);
                } else {
                    $user_balance->create([
                        'user_id' => $payment->user_id,
                        'balance' => $payment->amount,
                        'expiration' => Carbon::now('America/Mexico_City')->addYear()
                    ]);
                }

                Mail::to($user_owner->email)->send(new OrderConfirmation($payment));
            }
            elseif($merchant_order_info["response"]["payments"]['0']['status'] == 'rejected'){

                if ($order == '') {
                    return abort('500');
                }

                $order->status = '3';
                $order->save();

            }
            elseif($merchant_order_info["response"]["payments"]['0']['status'] == 'cancelled'){

                if ($order == '') {
                    return abort('500');
                }

                $order->status = '5';
                $order->save();

            }
            elseif($merchant_order_info["response"]["payments"]['0']['status'] == 'refunded'){

                if ($order == '') {
                    return abort('500');
                }

                $order->status = '6';
                $order->save();

            }
            else{
                if ($order == '') {
                    return abort('500');
                }

                $order->status = '4';
                $order->save();

            }

        }


    }


}

