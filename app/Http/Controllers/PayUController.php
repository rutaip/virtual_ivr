<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayUController extends Controller
{
    public function response()
    {

        $ApiKey = env('PAYU_APIKEY');
        $merchant_id = $_REQUEST['merchantId'];
        $referenceCode = $_REQUEST['referenceCode'];
        $TX_VALUE = $_REQUEST['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $_REQUEST['currency'];
        $transactionState = $_REQUEST['transactionState'];
        $firma_cadena = $ApiKey.'~'.$merchant_id.'~'.$referenceCode.'~'.$New_value.'~'.$currency.'~'.$transactionState;
        $firmacreada = md5($firma_cadena);
        $firma = $_REQUEST['signature'];
        $reference_pol = $_REQUEST['reference_pol'];
        $cus = $_REQUEST['cus'];
        $extra1 = $_REQUEST['description'];
        $pseBank = $_REQUEST['pseBank'];
        $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
        $transactionId = $_REQUEST['transactionId'];

        if ($_REQUEST['transactionState'] == 4 ) {
            $estadoTx = "Transacción aprobada";
        }

        else if ($_REQUEST['transactionState'] == 6 ) {
            $estadoTx = "Transacción rechazada";
        }

        else if ($_REQUEST['transactionState'] == 104 ) {
            $estadoTx = "Error";
        }

        else if ($_REQUEST['transactionState'] == 7 ) {
            $estadoTx = "Transacción pendiente";
        }

        else {
            $estadoTx=$_REQUEST['mensaje'];
        }

        return $estadoTx;


    }

    public function confirmation(Request $request){



    }
}
