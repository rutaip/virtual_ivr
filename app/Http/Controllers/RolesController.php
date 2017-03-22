<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests\RolesRequest;
use App\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $roles = Role::latest()->get();

        /*if  (Gate::denies('roles', $roles)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('roles.index', compact('roles'));
    }

    public function create()
    {

        return view('roles.create');
    }

    public function store(RolesRequest $request)
    {
        /*if  (Gate::denies('create', $request)) {

            abort(403, 'Sorry, not allowed');
        }*/

        Role::create($request->all());
        session()->flash('flash_message', 'Registro exitosamente creado!');
        return redirect('roles');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }

    public function update(RolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        /*if  (Gate::denies('edit', $role)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $role->update($request->all());
        session()->flash('flash_message', 'Registro actualizado correctamente!');
        return redirect('roles');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        /*if  (Gate::denies('delete', $role)) {

            abort(403, 'Sorry, not allowed');
        }*/

        $role->delete();
        session()->flash('flash_message', 'Registro eliminado!');
        return redirect('roles');
    }

    public function permissions($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::latest()->pluck('label','name');

        return view('roles.permissions', compact('role', 'permissions'));
    }

    public function rolePermissions(Request $request)
    {


        $role = Role::findOrFail($request->role_id);

        $role->givePermissionTo($request->permission);
        $permissions = Permission::latest()->pluck('label','name');
        session()->flash('flash_message', 'Permiso asignado correctamente');



        return view('roles.permissions', compact('role', 'permissions'));
    }

    public function removePermissions(Request $request)
    {

        $role = Role::findOrFail($request->role_id);

        $role->permissions()->detach($request->permission_id);
        $permissions = Permission::latest()->pluck('label','name');
        session()->flash('flash_message', 'Permiso eliminado correctamente');



        return view('roles.permissions', compact('role', 'permissions'));
    }
}
