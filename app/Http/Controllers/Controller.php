<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Clase para autenticación de usuarios y variables signedIn, user
     *
     */
    public function __construct()
    {
        view()->composer('*', function($view)
        {
            $view->with('signedIn', Auth::check());
            $view->with('user_logged', Auth::user());
        });
    }
}
