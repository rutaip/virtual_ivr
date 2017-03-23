<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ps_endpoint;
use App\ps_auths;
use App\ps_aors;
use App\Http\Requests\PsEndpointRequest;

class PsEndpointsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $endpoints = ps_endpoint::paginate(50);

        /*if  (Gate::denies('phones', $phones)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('endpoints.index', compact('endpoints'));
    }

    public function create()
    {

        return view('endpoints.create');
    }

    public function store(PsEndpointRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/


        /**
         * New endpoint
         */

        $request['aors'] = $request->id;
        $request['auth'] = $request->id;
        $request['disallow'] = 'all';
        $request['allow'] = implode(',', $request->allow);
        $request['direct_media'] = 'no';

        ps_endpoint::create($request->all());

        /**
         * New auth for endpoint
         */
        $auth = new ps_auths;
        $auth->id = $request->id;
        $auth->auth_type = 'userpass';
        $auth->username = $request->id;
        $auth->password = $request->password;
        $auth->save();

        /**
         * New aors for endpoint
         */

        $aors = new ps_aors;
        $aors->id = $request->id;
        $aors->max_contacts = '1';
        $aors->save();

        //session()->flash('flash_message', 'Registro exitosamente creado!');
        flash('Registro exitosamente creado', 'success');
        return redirect('endpoints');
    }

    public function show($id)
    {
        $phone = Phone::findOrFail($id);

        return view('phones.show', compact('phone'));
    }


    public function edit($id)
    {
        $endpoint = ps_endpoint::findOrFail($id);

        $codecs = explode(',', $endpoint->allow);

        return view('endpoints.edit', compact('endpoint', 'codecs'));
    }

    public function update(PsEndpointRequest $request, $id)
    {
        $endpoint = ps_endpoint::findOrFail($id);
        $auth = ps_auths::findOrFail($id);

        /*if  (Gate::denies('edit', $phone)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $request['allow'] = implode('&', $request->allow);
        $endpoint->update($request->all());

        $auth->password = $request->password;
        $auth->save();
        flash('Registro actualizado correctamente!', 'success');
        return redirect('endpoints');
    }


    public function destroy($id)
    {
        $endpoint = ps_endpoint::findOrFail($id);
        $auth = ps_auths::findOrFail($id);
        $aors = ps_aors::findOrFail($id);

        /*if  (Gate::denies('delete', $phone)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $endpoint->delete();
        $auth->delete();
        $aors->delete();
        flash('Registro eliminado!', 'success');
        return redirect('endpoints');
    }
}
