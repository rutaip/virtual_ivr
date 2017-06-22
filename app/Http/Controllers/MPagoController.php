<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use MP;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderDelivery;
use App\Payment;
use App\UserBalance;
use App\Order;
use App\User;
use Carbon\Carbon;


class MPagoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'confirmation']);

        parent::__construct();
    }

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

        Log::info($request->all());

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

        if ($merchant_order_info["status"] == 200) {

            //Mail::to('erick.nava@fastcode.today')->send(new OrderDelivery());
            $order = Order::where('order', $request->reference_sale)
                ->first();
            $user_owner = User::where('id', $order->user_id)->first();

            Log::info($merchant_order_info);

            if ($merchant_order_info['response']['payments']['status'] == 'approved') {



                Payment::firstOrCreate(['transaction_id' => $request->transaction_id],
                    [
                        'user_id' => $user_owner->id,
                        'payment_method' => 'Mercado Pago',
                        'amount' => $merchant_order_info["response"]['paid_amount'],
                        'status' => '2',
                        'transaction_id' => $request->transaction_id,
                        'order_id' => $order]);


                $payment = Payment::where('transaction_id', $request->transaction_id)
                    ->where('status', '1')
                    ->first();


                if ($payment == '') {
                    return abort('500');
                }

                $payment->status = '2';
                $payment->save();

                $order = Order::where('order', $payment->order_id)->first();
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

            } elseif ($request->state_pol == '6') {
                $payment = Order::where('order', $request->reference_sale)
                    ->where('status', '1')
                    ->first();


                if ($payment == '') {
                    return redirect('payments');
                }

                $payment->status = '3';
                $payment->save();

            } else {
                $payment = Order::where('order', $request->reference_sale)
                    ->where('status', '1')
                    ->first();


                if ($payment == '') {
                    return redirect('payments');
                }

                $payment->status = '5';
                $payment->save();

            }

            Log::info($merchant_order_info["response"]["payments"]);
            Log::info($merchant_order_info["response"]["shipments"]);
        }


    }


}

