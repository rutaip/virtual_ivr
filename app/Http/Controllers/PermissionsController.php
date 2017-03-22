<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $permissions = Permission::latest()->get();

        /* if  (Gate::denies('show-permissions', $permissions)){

             abort(403, 'Sorry, but no sorry');
         }*/

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {

        return view('permissions.create');
    }

    public function store(PermissionRequest $request)
    {

        Permission::create($request->all());
        session()->flash('flash_message', 'Record successfully created!');
        return redirect('permissions');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }


    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->update($request->all());
        session()->flash('flash_message', 'Record successfully updated!');
        return redirect('permissions');
    }

    public function destroy($id)
    {
            abort(403, 'Sorry, not allowed');
    }


}
