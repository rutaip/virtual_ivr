<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\UserBalance;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Clase para autenticación de usuarios y variables signedIn, user
     *
     */
    public function __construct()
    {
        view()->composer('*', function ($view) {
            $view->with('signedIn', Auth::check());
            $view->with('user_logged', Auth::user());

            $register_user = Auth::user()->id;

            $balance = UserBalance::where('user_id', $register_user)->first();


            if (!isset($balance)) {
                $credito = '0';
            } else {
                $credito = $balance->balance;
            }

            $view->with('balance', $credito);
        });

        view()->composer('emails', function ($view) {
            $register_user = null;
        });


    }
}
