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

Route::get('/home', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController');

Route::get('store/confirmation/{id}', 'StoreController@confirmation');
Route::get('store/denied/{id}', 'StoreController@denied');
Route::resource('store', 'StoreController');


Route::resource('payments', 'PaymentsController');

//Paypal
Route::post('paypal/create-payment', 'PayPalController@CreatePayment');
Route::post('paypal/execute-payment', 'PayPalController@ExecutePayment');
Route::get('paypal/test', 'PayPalController@test');


Route::resource('phones', 'PhonesController');
Route::resource('permissions', 'PermissionsController');
Route::resource('endpoints', 'PsEndpointsController');
Route::resource('ivrs', 'IvrsController');


//Rutas DIDWW
Route::get('dids/new_did', 'DidWWController@new_did');
Route::get('dids/confirmation/{id}', 'DidWWController@confirmation');
Route::resource('dids', 'DidWWController');



//Rutas para roles
Route::get('roles/{id}/permissions', 'RolesController@permissions');
Route::post('roles/role_permissions', 'RolesController@rolePermissions');
Route::post('roles/role_permissions_delete', 'RolesController@removePermissions');
Route::resource('roles', 'RolesController');
Route::resource('roles', 'RolesController');

