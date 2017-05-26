<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Order;
use App\Payment;
use App\User;
use App\UserBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

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
            return view('store.paypal', compact('amount', 'months', 'subtotal', 'tax', 'total', 'user', 'order'));
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

        $payment = Payment::where('transaction_id', $id)
            ->where('status', '1')
            ->first();


        if ($payment == '') {
            return redirect('payments');
        }

        $payment->status = '2';
        $payment->save();




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

        $payment = Payment::where('order', $id)
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
