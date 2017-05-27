<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Mail\OrderDelivery;
use App\Order;
use App\Payment;
use App\User;
use App\UserBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MP;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'delivery']);

        parent::__construct();
    }

    public function index()
    {

        return view('store.index');
    }

    public function create()
    {

        return view('phones.create');
    }

    public function store(Request $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $amount = $request->amount;
        $months = $request->meses;
        $subtotal = $amount * $months;
        $tax = $subtotal * .16;
        $total = $subtotal + $tax;
        $user = Auth::user()->id;
        $order = 'INV-' . Carbon::now('America/Mexico_City')->format('Ymd') . '-' . uniqid();

        Order::create(['order' => $order, 'amount' => $amount, 'months' => $months, 'user_id' => $user, 'status' => '1']);

        if ($request->provider == 'paypal') {
            return view('store.paypal', compact('amount', 'months', 'subtotal', 'tax', 'total', 'user', 'order'));
        } else {

            $preference = $this->mercadopago($amount, $months, $request, $subtotal, $tax, $total, $user, $order);


            Payment::firstOrCreate(['transaction_id' => $preference['response']['id']],['user_id' => Auth::user()->id, 'payment_method' => 'Mercado Pago', 'amount' => $amount, 'status' => '1', 'transaction_id' => $preference["response"]["id"], 'order_id' => $order]);

            return view('store.mercadopago', compact('amount', 'months', 'subtotal', 'tax', 'total', 'user', 'order', 'preference'));
        }
    }

    public function show($id)
    {
        $phone = Phone::findOrFail($id);

        return view('phones.show', compact('phone'));
    }


    public function edit($id)
    {
        $phone = Phone::findOrFail($id);

        return view('phones.edit', compact('phone'));
    }

    public function update(PhoneRequest $request, $id)
    {
        $phone = Phone::findOrFail($id);

        /*if  (Gate::denies('edit', $phone)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $phone->update($request->all());
        flash('Registro actualizado correctamente!', 'success');
        return redirect('phones');
    }


    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);

        /*if  (Gate::denies('delete', $phone)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $phone->delete();
        flash('Registro eliminado!', 'success');
        return redirect('phones');
    }

    public function confirmation($id)
    {

        if (substr($id, 0,3) == 'MP-') //Si es confirmación de MercadoPago
        {
            $payment = Payment::where('order_id', substr($id,3))
                ->first();
            $id = $payment->transaction_id;
        }

        $payment = Payment::where('transaction_id', $id)
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

        flash('Pago exitoso!', 'success');


        return view('store.confirmation');
    }

    public function denied($id)
    {

        $payment = Order::where('order', $id)
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

    public function pending($id)
    {

        $payment = Order::where('order', $id)
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

    public function mercadopago($amount, $months, $request, $subtotal, $tax, $total, $user, $order)
    {
        $mp = new MP('7571760329122817', 'rf34phbyWJ4qTrZBDX3LEasra5IXR3Jp');

        $preference_data = array(
            "items" => array(
                array(
                    "title" => 'Fastcode Virtual IVR',
                    "description" => 'Recarga de Servicio Virtual IVR ' . number_format($amount, 2) . ' + iva x ' . $months,
                    "quantity" => 1,
                    "currency_id" => "MXN", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => (int)$total
                )
            ),
            "payer" => array(
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ),
            "back_urls" => array(
                "success" => url('store/confirmation') . '/' . 'MP-' . $order,
                "pending" => url('store/pending') . '/' . $order,
                "failure" => url('store/denied') . '/' . $order,
            ),
            'auto_return' => 'all',
            'notification_url' => url('store/delivery'),
            'external_reference' => $order
        );

        $preference = $mp->create_preference($preference_data);

        return $preference;
    }

    public function delivery(){

        $id = Input::get('id');

        $mp = new MP('7571760329122817', 'rf34phbyWJ4qTrZBDX3LEasra5IXR3Jp');

        $mp->sandbox_mode(TRUE);

        if (!isset($id) || !ctype_digit($id)) {
            http_response_code(400);
            return;
        }

        $payment_info = $mp->get_payment_info($id);


        if ($payment_info["status"] == 200) {
            Mail::to('erick.nava@fastcode.today')->send(new OrderDelivery());
            print_r($payment_info["response"]);
        }

    }
}
