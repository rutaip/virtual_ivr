<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use MP;


class MPagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function test(){

        //File::requireOnce(base_path('vendor/mercadopago/sdk/lib/mercadopago.php'));

        $mp = new MP('7571760329122817', 'rf34phbyWJ4qTrZBDX3LEasra5IXR3Jp');

        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Multicolor kite",
                    "quantity" => 1,
                    "currency_id" => "MXN", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => 10.00
                )
            )
        );

        $preference = $mp->create_preference($preference_data);

        return view('store.mercadopago', compact('preference'));

    }


}

