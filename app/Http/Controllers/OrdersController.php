<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function index()
    {
        $orders = Order::latest()
            ->where('user_id', Auth::id())
            ->paginate(25);

        /*if  (Gate::denies('orders', $orders)) {

            abort(403, 'Sorry, not allowed');
        }*/

        return view('orders.index', compact('orders'));
    }
}
