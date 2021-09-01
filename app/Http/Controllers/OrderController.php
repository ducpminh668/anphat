<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('details')->paginate(10);
        return view('orders.index')->withOrders($orders);
    }

    public function invoice($id)
    {
        $order = Order::with('details')->findOrFail($id);
        return view('orders.invoice')->withOrder($order);
    }

    public function edit()
    {
        return 'adsf';
    }

    public function create()
    {
        $customers = Customer::with('user')->get();
        return view('orders.create')
            ->with('customers', $customers);
    }
}
