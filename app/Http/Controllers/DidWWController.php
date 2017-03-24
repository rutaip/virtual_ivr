<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
use Exception;
use SoapFault;
use App\Did;
use App\DidWw;
use Illuminate\Support\Facades\Auth;

class DidWWController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $dids = Did::where('user_id', Auth::user()->id)->paginate(50);

        /*if  (Gate::denies('phones', $phones)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('dids.index', compact('dids'));
    }

    public function create()
    {

        $cities = DidWw::where('city_prefix', '<>', '800')
            ->where('isavailable', '1')
            ->get();

        return view('dids.create', compact('cities'));
    }

    public function store(Request $data)
    {

        /**
         * Variables
         */
        $uname = env('DID_USERNAME');
        $key   = env('DID_KEY');
        $test = env('DID_ENV');
        $user_id = Auth::user()->id;
        $iso = $data->iso;
        $city_prefix = $data->city_prefix;
        $period = $data->period;
        $base_credit = '8'; //USD
        $prepaid_funds = ($base_credit * $period);
        $uniq_hash= md5('7');
        $city_id = $data->city_id;

        /**
         * Autenticación e inicio de API DIDWW
         */

        $api = new DidwwApi($uname,$key,$test);

        /**
         * Metodo para crear nuevo servicio
         *
         */



        $map_data = array(
            "map_type" => "URI",
            "map_proto" => "SIP",
            "map_detail" => "12.34.56.78/3763126666123",
            "map_pref_server" => 0,
            "map_itsp_id" => null,
            "cli_format"=>"raw",
            "cli_prefix"=>""
        );

        $service_new = $api->createOrder($user_id, $iso, $city_prefix, $period, $map_data, $prepaid_funds, $uniq_hash, $city_id);




        $did = new Did;
        $did->country_name = $service_new->country_name;
        $did->country_iso = $service_new->country_iso;
        $did->city_name = $service_new->city_name;
        $did->city_prefix = $service_new->city_prefix;
        $did->city_id = $service_new->city_id;
        $did->did_number = $service_new->did_number;
        $did->did_status = $service_new->did_status;
        $did->did_timeleft = $service_new->did_timeleft;
        $did->did_expire_date_gmt = $service_new->did_expire_date_gmt;
        $did->order_id = $service_new->order_id;
        $did->order_status = $service_new->order_status;
        $did->did_mapping_format = $service_new->did_mapping_format;
        $did->did_setup = $service_new->did_setup;
        $did->did_monthly = $service_new->did_monthly;
        $did->did_period = $service_new->did_period;
        $did->autorenew_enable = $service_new->autorenew_enable;
        $did->prepaid_balance = $service_new->prepaid_balance;
        $did->user_id = Auth::user()->id;
        $did->save();

        return redirect('dids/confirmation/'.$did->did_number);

    }

    public function confirmation($id)
    {
        $did = Did::where('did_number', $id)->first();

        if($did->user_id <> Auth::user()->id){
            abort(403, 'Sorry, not allowed');
        }

        return view('dids.confirmation', compact('did'));

    }


}


/**
 * Inicia sección de API DIDWW
 */

define("DIDWW_API_WSDL_TEST", 'https://sandbox-api.didww.com/api2/index.php?wsdl');
define("DIDWW_API_WSDL", 'https://api.didww.com/api2/?wsdl');

class DidwwApi
{

    static $_errorCodes =
        array(
            "100" => "Access denied",
            "150" => "Server error when validating an API client request",
            "151" => "Array has invalid data",
            "200" => "Server error when processing an API client request",
            "300" => "Type not valid",
            "301" => "Protocol not valid",
            "302" => "Unsupported format for this type",
            "303" => "PSTN prefix not supported",
            "400" => "API Order ID not found or invalid",
            "401" => "API Order ID not in valid status",
            "405" => "Transaction refused",
            "410" => "Transaction out of balance",
            "411" => "Account balance is disabled/suspened/has not enough amount for purchases",
            "430" => "Customer: Prepaid Balance disabled or not exist",
            "500" => "Region(s) not found or invalid",
            "501" => "City not found",
            "505" => "DIDs not available for this region",
            "600" => "DID Number not found or invalid"
        );
    /**
     * @var SoapClient
     */
    private $_client;
    private $_errorString;
    private $_errorCode;
    private $_authstr;
    private $_callback;

    function setCallback($callback)
    {
        if (!is_string($callback) && !is_array($callback))
        {
            return false;
        }

        $this->_callback = $callback;
        return true;
    }

    function getClient()
    {
        return $this->_client;
    }

    function getErrorCode()
    {
        return $this->_errorCode;
    }

    function getErrorString()
    {
        return $this->_errorString;
    }

    function getError()
    {
        if($this->_errorCode)
        {
            return "Error: (code: {$this->_errorCode}, message: {$this->_errorString})";
        }
        return NULL;
    }


    function setCredentials($user,$pass,$test = false)
    {
        $this->_client = new SoapClient($test ? DIDWW_API_WSDL_TEST : DIDWW_API_WSDL);
        $this->_authstr = sha1($user . $pass  .  ($test ? 'sandbox'  :''));
    }

    function __construct($user, $pass, $test  = false)
    {
        $this->setCredentials($user, $pass,$test);
    }

    function getAvailableMethods()
    {
        $soapFunctions = $this->_client->__getFunctions();
        for ($i = 0; $i < count($soapFunctions); $i++)
        {
            preg_match("/[\s\S]*?(didww_[\s\S]*?)\([\s\S]*?/", $soapFunctions[$i], $matche);
            $soapFunctions[$i] = $matche[1];
        }
        return $soapFunctions;
    }

    private function _handleQuery( $method, $params=array())
    {
        $params = array_merge(array('auth_string' => $this->_authstr),$params);
        $timeStart = microtime(true);
        try
        {
            $method='didww_'.$method;
            //time measure
            $result = $this->_client->__soapCall($method, $params);
        }catch(SoapFault $e)
        {
            $this->_errorCode = $e->faultcode;
            $this->_errorString = $e->faultstring;

            $result = $e;
        }catch(Exception $e)
        {
            $this->_errorCode = $e->getCode();
            $this->_errorString = $e->getMessage();

            $result = $e;
        }

        $timeFinish = microtime(true);
        // If result contains error field trying to resolve error text by error code
        if(isset($result->error) && $result->error>0)
        {
            $result->error = isset ( self::$_errorCodes[$result->error]) ? self::$_errorCodes[$result->error] :
                'Unknown error with code : '.$result->error ;
        }


        if($this->_callback){

            call_user_func_array($this->_callback,array(
                "result"=>$result,
                "method"=>$method,
                "params"=>$params,
                "error"=>$this->_errorString,
                "code"=>$this->_errorCode,
                "seconds"=>$timeFinish-$timeStart
            ) );
        }
        return $result;
    }

    function getServiceDetails($customer_id = 0, $api_order_id = 0,$did = 0){
        return $this->_handleQuery('getservicedetails', array('customer_id' => $customer_id, 'api_order_id' => $api_order_id,'did_number' => $did));
    }

    function getRegions($iso = 0 , $city_prefix = 0, $last_request_gmt = 0) {
        return $this->_handleQuery(
            'getdidwwregions',
            array(
                'country_iso' => $iso,
                'city_prefix' => $city_prefix,
                'last_request_gmt' => $last_request_gmt
            )
        );
    }

    function getCity($iso , $city_prefix)
    {
        return $this->getRegions($iso, $city_prefix);
    }

    function getCountry($iso)
    {
        return $this->getRegions($iso);
    }


    function getPstnRates($iso= 0,$pstn_prefix= 0)
    {
        return $this->_handleQuery('getdidwwpstnrates',array('country_iso_code'=>$iso,'pstn_prefix'=>$pstn_prefix));
    }

    /**
     * Update pstn rates on DIDWW side
     * @param array $rates
     */
    function setPstnRates($rates)
    {
        return $this->_handleQuery('updatepstnrates',array('rates'=>$rates));
    }

    function checkPstnNumber($number)
    {
        return $this->_handleQuery('checkpstnnumber',array('pstn_number'=>$number));
    }

    function  orderAutoRenew($user_id,$did_number,$period,$uniq_hash)
    {
        return $this->_handleQuery(
            'orderautorenew',
            array(
                'customer_id' => $user_id,
                'did_number' => $did_number,
                'period' => $period,
                'uniq_hash' => $uniq_hash
            )
        );
    }

    function createOrder($user_id, $iso, $city_prefix, $period, $map_data, $prepaid_funds, $uniq_hash, $city_id)
    {
        return $this->_handleQuery(
            'ordercreate',
            array(
                'customer_id' => $user_id,
                'country_iso_code'=>$iso,
                'city_prefix'=>$city_prefix,
                'period' => $period,
                'map_data'=>$map_data,
                'prepaid_funds'=>$prepaid_funds,
                'uniq_hash'=> $uniq_hash,
                'city_id'=>$city_id
            )
        );
    }

    function cancelOrder($user_id, $did_number)
    {
        return $this->_handleQuery(
            'ordercancel',
            array(
                'customer_id' => $user_id,
                'did_number' => $did_number
            )
        );
    }

    function updateMapping($user_id, $did_number, $map_data)
    {
        return $this->_handleQuery(
            'updatemapping',
            array(
                'customer_id'=> $user_id,
                'did_number' => $did_number,
                'map_data' => $map_data
            )
        );
    }

    function updatePrepaidBalance($customer_id, $prepaid_funds, $operation_type,$uniq_hash)
    {
        return $this->_handleQuery(
            'updateprepaidbalance',
            array(
                'customer_id'=>$customer_id,
                'prepaid_funds'=>$prepaid_funds,
                'operation_type'=>$operation_type,
                'uniq_hash'=> $uniq_hash
            )
        );
    }

    function getPrepaidBalance($customer_id=0)
    {
        return  $this->_handleQuery('getprepaidbalancelist',array('customer_id'=>$customer_id));

    }

    function getCdrLog($customer_id,$last_requested_date=NULL)
    {
        if(!$last_requested_date)
            $last_requested_date = '2010-01-01 00:00:00';

        return $this->_handleQuery('getfullcdrlog',
            array(
                'customer_id'=>$customer_id,
                'last_requested_date'=>$last_requested_date
            )
        );
    }

    function getDetails()
    {
        return $this->_handleQuery('getdidwwapidetails');
    }

    function getServiceList($auth_string=0, $customer_id=0){
        return $this->_handleQuery('getservicelist', array('auth_string' => $auth_string, 'customer_id' => $customer_id));
    }
}