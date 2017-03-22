<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('registro', function () {
    return view('auth.registro');
});

Route::get('dashboard', function () {
    return view('dashboard.index');
});

Route::resource('phones', 'PhonesController');
Route::resource('permissions', 'PermissionsController');


//Rutas para roles
Route::get('roles/{id}/permissions', 'RolesController@permissions');
Route::post('roles/role_permissions', 'RolesController@rolePermissions');
Route::post('roles/role_permissions_delete', 'RolesController@removePermissions');
Route::resource('roles', 'RolesController');
Route::resource('roles', 'RolesController');

