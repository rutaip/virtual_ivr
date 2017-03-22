<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\Http\Requests\PhoneRequest;
use Illuminate\Support\Facades\Auth;

class PhonesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $phones = Phone::latest()
            ->where('user_id', Auth::id())
            ->paginate(25);

        /*if  (Gate::denies('phones', $phones)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('phones.index', compact('phones'));
    }

    public function create()
    {

        return view('phones.create');
    }

    public function store(PhoneRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $request['user_id'] = Auth::id();
        $request['company_id'] = null;

        Phone::create($request->all());
        //session()->flash('flash_message', 'Registro exitosamente creado!');
        flash('Registro exitosamente creado', 'success');
        return redirect('phones');
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
}
