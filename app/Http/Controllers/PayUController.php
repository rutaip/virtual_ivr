<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\UserBalance;
use Carbon\Carbon;
use App\Mail\OrderConfirmation;

class PayUController extends Controller
{
    public function response()
    {

        $ApiKey = env('PAYU_APIKEY');
        $merchant_id = $_REQUEST['merchantId'];
        $referenceCode = $_REQUEST['referenceCode'];
        $TX_VALUE = $_REQUEST['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $_REQUEST['currency'];
        $transactionState = $_REQUEST['transactionState'];
        $firma_cadena = $ApiKey.'~'.$merchant_id.'~'.$referenceCode.'~'.$New_value.'~'.$currency.'~'.$transactionState;
        $firmacreada = md5($firma_cadena);
        $firma = $_REQUEST['signature'];
        $reference_pol = $_REQUEST['reference_pol'];
        $cus = $_REQUEST['cus'];
        $extra1 = $_REQUEST['description'];
        $pseBank = $_REQUEST['pseBank'];
        $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
        $transactionId = $_REQUEST['transactionId'];

        Payment::firstOrCreate(['transaction_id' => $transactionId],['user_id' => Auth::user()->id, 'payment_method' => 'PayU', 'amount' => $TX_VALUE, 'status' => '1', 'transaction_id' => $transactionId, 'order_id' => $referenceCode]);


        if ($_REQUEST['transactionState'] == 4 ) {
            $estadoTx = "Transacción aprobada";


            flash('Pago exitoso!', 'success');


            return view('store.confirmation');
        }

        else if ($_REQUEST['transactionState'] == 6 ) {
            $estadoTx = "Transacción rechazada";



            flash('Pago Declinado', 'error');


            return view('store.denied');
        }

        else if ($_REQUEST['transactionState'] == 104 ) {
            $estadoTx = "Error";

            $payment = Order::where('order', $referenceCode)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
            }

            $payment->status = '3';
            $payment->save();


            flash('Pago Declinado', 'error');


            return view('store.denied');


        }

        else if ($_REQUEST['transactionState'] == 7 ) {
            $estadoTx = "Transacción pendiente";

            $payment = Order::where('order', $referenceCode)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
            }

            $payment->status = '4';
            $payment->save();


            flash('Pago Pendiente', 'warning');


            return view('store.pending');
        }

        else {
            $estadoTx=$_REQUEST['mensaje'];

            $payment = Order::where('order', $referenceCode)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
            }

            $payment->status = '3';
            $payment->save();


            flash('Pago Declinado', 'error');


            return view('store.denied');
        }

    }

    public function confirmation(Request $request){

        Log::info($request->all());

        $order = Order::where('order', $request->reference_sale)
            ->first();

        Log::info($order->user_id);


        Payment::firstOrCreate(['transaction_id' => $request->transaction_id],
            ['user_id' => $order->user_id,
                'payment_method' => 'PayU',
                'amount' => $request->value,
                'status' => '1',
                'transaction_id' => $request->transaction_id,
                'order_id' => $request->reference_sale
            ]);



        if($request->state_pol == '4'){
            $payment = Payment::where('transaction_id', $request->transaction_id)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
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

            Mail::to(Auth::user()->email)->send(new OrderConfirmation($payment));

        }
        elseif ($request->state_pol == '6'){
            $payment = Order::where('order', $request->reference_sale)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
            }

            $payment->status = '3';
            $payment->save();

        }
        else{
            $payment = Order::where('order', $request->reference_sale)
                ->where('status', '1')
                ->first();


            if ($payment == '') {
                return redirect('payments');
            }

            $payment->status = '5';
            $payment->save();

        }




    }
}
