<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function listProduct()
    {
        if (Auth::user()->customer) {
            $products = DB::table('products')

                ->leftJoin('product_prices', 'product_prices.product_id', '=', 'products.id')
                ->leftJoin('product_price_customers', 'product_price_customers.product_price_id', '=', 'product_prices.id')
                ->whereNull('group_id')
                ->orWhere('group_id', Auth::user()->customer->group_id)
                ->select('products.*', 'product_prices.*', 'product_price_customers.*', 'products.id as pid')
                ->paginate(10);
            return view('client.listProduct')->withProducts($products);
        } else {
            return abort(403);
        }
    }

    public function submitCart(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'customer_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'cart' => 'required',
        ]);

        $cart = json_decode($request->cart);
        $order = Order::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 0,
            'contact_name' => $request->name,
            'total' => $cart->total,
            'customer_id' => $request->customer_id
        ]);
        return redirect()->back();
    }

    public function showCart()
    {
        return view('client.cart');
    }
}
