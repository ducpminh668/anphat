<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function listProduct()
    {
        if (Auth::user()->customer) {
            $products = DB::table('products')
                ->where('quantity', '>', 0)
                ->leftJoin('product_prices', 'product_prices.product_id', '=', 'products.id')
                ->leftJoin('product_price_customers', 'product_price_customers.product_price_id', '=', 'product_prices.id')
                ->where('group_id', Auth::user()->customer->group_id)
                ->orWhereNull('group_id')
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
        $lastedID = Order::latest('id')->first() ? Order::latest('id')->first()->id : 0;
        $order = Order::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 0,
            'contact_name' => $request->name,
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
                'barcode' => $item->barcode,
            ]);

            $product = Product::find($item->product_id);
            $product->update([
                'quantity' => $product->quantity - $item->quantity
            ]);
        }

        return redirect('/orderSuccess');
    }

    public function showCart()
    {
        return view('client.cart');
    }

    public function orderSuccess()
    {
        return view('client.orderSuccess')->with('removeCart', 1);
    }

    public function getProductByCustomer(Request $request)
    {
        $group_id = $request->group_id;
        return DB::table('products')
            ->where('quantity', '>', 0)
            ->leftJoin('product_prices', 'product_prices.product_id', '=', 'products.id')
            ->leftJoin('product_price_customers', 'product_price_customers.product_price_id', '=', 'product_prices.id')
            ->where('products.name', 'like', '%' . $request->name . '%')
            ->where(function ($q) use ($group_id) {
                $q->where('group_id', $group_id)
                    ->orWhereNull('group_id');
            })
            ->select('products.*', 'product_prices.*', 'product_price_customers.*', 'products.id as pid')
            ->paginate(10);
    }
}
