<?php

namespace App\Http\Controllers;

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
                ->paginate(10);
        } else {
            return abort(403);
        }

        return view('client.listProduct')->withProducts($products);
    }
}
