<?php

namespace App\Http\Controllers;

use App\Cdr;
use Illuminate\Http\Request;

class CdrController extends Controller
{

    public function index()
    {
        $cdr = Cdr::all();

        return $cdr;
    }
}
