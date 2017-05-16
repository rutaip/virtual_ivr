<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Http\Requests\PaymentRequest;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $payments = Payment::latest()
            ->where('user_id', Auth::id())
            ->paginate(25);

        /*if  (Gate::denies('payments', $payments)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('payments.index', compact('payments'));
    }

    public function create()
    {

        return view('payments.create');
    }

    public function store(PaymentRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');

        }*/

        return $request;

        $request['user_id'] = Auth::id();
        $request['company_id'] = null;

        Payment::create($request->all());
        //session()->flash('flash_message', 'Registro exitosamente creado!');
        flash('Registro exitosamente creado', 'success');
        return redirect('payments');
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.show', compact('payment'));
    }


    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.edit', compact('payment'));
    }

    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);

        /*if  (Gate::denies('edit', $payment)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $payment->update($request->all());
        flash('Registro actualizado correctamente!', 'success');
        return redirect('payments');
    }


    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        /*if  (Gate::denies('delete', $payment)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $payment->delete();
        flash('Registro eliminado!', 'success');
        return redirect('payments');
    }
}
