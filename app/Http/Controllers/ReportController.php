<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function quantityReport()
    {
        $product = Product::select('name', 'barcode', 'quantity', 'cost_price');
        $total = $product->sum(DB::raw('products.cost_price * products.quantity'));
        $quantity = $product->sum('quantity');
        $pr = $product->paginate(20);
        return view('reports.quantityReport')
            ->with('products', $pr)
            ->with('total', $total)
            ->with('quantity', $quantity);
    }

    public function revenueReport(Request $request)
    {
        $orders = Order::with('details');
        if ($request->start_date) {
            $orders = $orders->where('created_at', '>', $request->start_date);
        }
        if ($request->end_date) {
            $orders = $orders->where('created_at', '>', $request->end_date);
        }
        $sumRevenue = $orders->sum('total_due');
        $orders =  $orders->paginate(10);
        return view('reports.revenueReport')
            ->with('sumRevenue', $sumRevenue)
            ->with('orders', $orders);
    }
}
