<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Input;


class PayPalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function CreatePayment()
    {

        $subtotal = $_POST['amount'];
        $order = $_POST['order'];
        $customer = $_POST['user'];
        $months = $_POST['months'];
        $iva = '1.16';
        $total = $subtotal * $iva;
        $tax = $total - $subtotal;


        $url = 'https://api.sandbox.paypal.com/';
        $paypal_userid = env('PAYPAL_CLIENTID');
        $paypal_secret = env('PAYPAL_SECRET');
        $key = base64_encode($paypal_userid . ':' . $paypal_secret);


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);


        $response = $client->request('POST', 'v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
                'Accept-Language' => 'en_US',
                'Authorization' => 'Basic ' . $key
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);


        $elements = json_decode($response->getBody());

        $token = $elements->access_token;

        /**
         * Web Experience


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);

        $url_data = [
            'name' => 'Fastcode_checkout',
            'presentation' => [
                'brand_name' => 'FASTCODE.TODAY SAS',
                'locale_code' => 'US'
            ],
            'input_fields' => [
                'no_shipping' => '0',
                'address_override' => '1'
            ],
            'flow_config' => [
                'landing_page_type' => 'billing',
                'bank_txn_pending_url' => 'http://www.yeowza.com'
            ]
        ];

        $response = $client->request('POST', 'v1/payment-experience/web-profiles', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
            'body' => json_encode($url_data),

        ]);


        $elements = json_decode($response->getBody());
        */

        /**
         * Payment Request
         */

        $data = [
            'intent' => 'sale',
            //'experience_profile_id' => $elements->id,
            'payer' => [
                'payment_method' => 'paypal'
            ],
            'transactions' => array([
                'amount' => [
                    'total' => number_format($total, 2),
                    'currency' => 'MXN',
                    'details' => [
                        'subtotal' => number_format($subtotal, 2),
                        'tax' => number_format($tax, 2),
                        'shipping' => '0.00',
                        'handling_fee' => '0.00',
                        'shipping_discount' => '0.00',
                        'insurance' => '0.00'
                    ]
                ],
                'description' => 'Descripción del pago',
                'custom' => 'EBAY_EMS_90048630024435',
                'invoice_number' => $order,
                'payment_options' => [
                    'allowed_payment_method' => 'INSTANT_FUNDING_SOURCE'
                ],
                'soft_descriptor' => '123456',
                'item_list' => [
                    'items' => array([
                        'name' => 'Virtual IVR',
                        'description' => 'Pago de Servicio Virtual IVR Paquete ' . number_format($subtotal,2) . ' + iva x ' . $months,
                        'quantity' => '1',
                        'price' => number_format($subtotal,2),
                        'tax' => number_format($tax,2),
                        'sku' => '1',
                        'currency' => 'MXN'
                    ])
                ],
            ]),
            'redirect_urls' => [
                'return_url' => 'http://www.google.com',
                'cancel_url' => 'http://www.paypal.com/cancel'

            ],
            'note_to_payer' => 'Contactenos en caso de preguntas'
        ];

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);

        $clientHandler = $client->getConfig('handler');
        $tapMiddleware = Middleware::tap(function ($request) {
            //echo $request->getHeaderLine('Content-Type');
            // application/json
            //echo $request->getBody();
            // {"foo":"bar"}
        });





        $response = $client->request('POST', 'v1/payments/payment', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
            'body' => json_encode($data),
            'handler' => $tapMiddleware($clientHandler)
        ]);


        $elements = json_decode($response->getBody());

        $PaymentId = ['paymentID' => $elements->id];



        Payment::create(['user_id' => $customer, 'payment_method' => 'paypal', 'amount' => $subtotal, 'status' => '1', 'transaction_id' => $elements->id, 'order_id' => $order]);

        return $PaymentId;

    }

    public function ExecutePayment(Request $data) {

        $url = 'https://api.sandbox.paypal.com/';
        $paypal_userid = env('PAYPAL_CLIENTID');
        $paypal_secret = env('PAYPAL_SECRET');
        $key = base64_encode($paypal_userid . ':' . $paypal_secret);

        $paymnet_id = $data->paymentID;
        $payer_id = ['payer_id' => $data->payerID];




        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);


        $response = $client->request('POST', 'v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
                'Accept-Language' => 'en_US',
                'Authorization' => 'Basic ' . $key
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);


        $elements = json_decode($response->getBody());


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            //'timeout'  => 2.0,
        ]);

        $response = $client->request('POST', 'v1/payments/payment/' .$paymnet_id. '/execute/', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $elements->access_token
            ],
            'body' => json_encode($payer_id),
        ]);

        $elements = json_decode($response->getBody());

        $PaymentId = ['paymentID' => $elements->id];

        return $PaymentId;    }

    public function test() {


        $data = [
            'intent' => 'sale',
            'payer' => [
                'payment_method' => 'paypal'
            ],
            'transactions' => array([
                'amount' => [
                    'total' => '33.00',
                    'currency' => 'USD',
                    'details' => [
                        'subtotal' => '30.00',
                        'tax' => '1.00',
                        'shipping' => '1.00',
                        'handling_fee' => '1.00',
                        'shipping_discount' => '-1.00',
                        'insurance' => '1.00'
                    ]
                ],
                'description' => 'Descripción del pago',
                'custom' => 'EBAY_EMS_90048630024435',
                'invoice_number' => '48787589',
                'payment_options' => [
                    'allowed_payment_method' => 'INSTANT_FUNDING_SOURCE'
                ],
                'soft_descriptor' => '123456',
                'item_list' => [
                    'items' => array([
                        'name' => 'Virtual IVR',
                        'description' => 'Pago de Servicio Virtual IVR Paquete 455',
                        'quantity' => '1',
                        'price' => '3',
                        'tax' => '1',
                        'sku' => '1',
                        'currency' => 'USD'
                    ])
                ],
            ]),
            'redirect_urls' => [
                'return_url' => 'http://www.paypal.com/return',
                'cancel_url' => 'http://www.paypal.com/cancel'

            ],
            'note_to_payer' => 'Contactenos para cualquier pregunta'
        ];

        return $data;

    }

}
