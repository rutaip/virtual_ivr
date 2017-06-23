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
Route::get('verifyemail/{token}', 'Auth\RegisterController@verify');

Route::resource('extensions', 'ExtensionsController');

//Store
Route::get('store/confirmation/{id}', 'StoreController@confirmation');
Route::get('store/denied/{id}', 'StoreController@denied');
Route::get('store/pending/{id}', 'StoreController@pending');
Route::resource('store', 'StoreController');


Route::resource('payments', 'PaymentsController');
Route::resource('orders', 'OrdersController');


//Paypal
Route::post('paypal/create-payment', 'PayPalController@CreatePayment');
Route::post('paypal/execute-payment', 'PayPalController@ExecutePayment');
Route::get('paypal/test', 'PayPalController@test');

//Mercadopago
Route::post('mercadopago/create-payment', 'MPagoController@CreatePayment');
Route::post('mercadopago/execute-payment', 'MPagoController@ExecutePayment');
Route::get('mercado/success', 'MPagoController@success');
Route::get('mercado/pending', 'MPagoController@pending');
Route::get('mercado/denied', 'MPagoController@denied');
Route::get('mercado/confirmation', 'MPagoController@confirmation');
Route::post('mercado/confirmation', 'MPagoController@confirmation');

//PayU
Route::get('payu/response', 'PayUController@response');
Route::post('payu/confirmation', 'PayUController@confirmation');



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
