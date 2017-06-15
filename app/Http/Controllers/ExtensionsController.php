<?php

namespace App\Http\Controllers;

use App\Extension;
use Illuminate\Http\Request;

class ExtensionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {

        $did = '525585261041';
        $context = 'from-didww';
        $priority = 'n';

        $dialplan = new Extension();
        $dialplan->exten = $did;
        $dialplan->context = $context;
        $dialplan->priority = '1';
        $dialplan->app = 'NoOp';
        $dialplan->appdata = 'prueba de texto inicial';
        $dialplan->save();

        $dialplan = new Extension();
        $dialplan->exten = $did;
        $dialplan->context = $context;
        $dialplan->priority = '2';
        $dialplan->app = 'Background';
        $dialplan->appdata = 'custom/fastcode_1';
        $dialplan->save();

        return $dialplan;

        return view('ivrs.index');
    }

    public function create()
    {

        $cities = DidWw::where('city_prefix', '<>', '800')
            ->where('isavailable', '1')
            ->get();

        return view('ivrs.create', compact('cities'));
    }

    public function store(Request $request)
    {

        return $request->all();
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
