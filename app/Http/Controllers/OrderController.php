<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function edit($id)
    {
        // $order = Order::with('details')->findOrFail($id);
        $order = DB::table('orders')
            ->select('order_details.*', 'orders.*','order_details.quantity as qty', 'products.name', 'products.barcode', 'products.short_desc', 'orders.id as oid')
            ->join('order_details', 'orders.id', 'order_details.order_id')
            ->join('products', 'products.id', 'order_details.product_id')
            ->where('orders.id', '=', $id)
            ->get();

        return view('orders.edit')
            ->with('order', $order);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_name' => 'required',
            'customer_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'cart' => 'required',
        ]);

        $cart = json_decode($request->cart);
        $lastedID = Order::latest('id')->first() ? Order::latest('id')->first()->id : 0;
        $order = Order::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 0,
            'contact_name' => $request->contact_name,
            'total' => $cart->total,
            'customer_id' => $request->customer_id,
            'note' => $request->note,
            'order_id' => date("ymdH") . ($lastedID + 1),
            'tax' => $cart->total / 10,
            'total_due' => $cart->total * 110 / 100,
            'user_id' => Auth::user()->id
        ]);

        foreach ($cart->items as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_name' => $item->name,
                'price' => $item->price,
                'rowtotal' => $item->rowtotal,
                'quantity' => $item->quantity,
                'cost_price' => $item->cost_price,
                'product_id' => $item->product_id,
            ]);
        }

        return redirect()->route('orders.index');
    }

    public function orderReturn($id)
    {
        $order = Order::with('details')->findOrFail($id);
        return view('orders.orderReturn')
            ->with('order', $order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        dd($request->all());
    }
}
