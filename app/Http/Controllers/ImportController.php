<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\ImportDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $im = Import::with(['details', 'user'])->paginate(20);
        return view('imports.index')->withIm($im);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $count = 0;
        foreach ($request->cart as $item) {
            $count += $item['count'];
            $total += $item['im_total'];
        }
        try {
            $im = Import::create([
                'code' => $request->code,
                'supplier' => $request->supplier,
                'note' => $request->note,
                'product_count' => count($request->cart),
                'quantity' => $count,
                'total' => $total,
                'user_id' => Auth::user()->id,
            ]);
            foreach ($request->cart as $item) {
                ImportDetail::create([
                    'import_id' => $im->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'dvt' => $item['dvt'],
                    'manufacturer' => $item['manufacturer'],
                    'quantity' => $item['count'],
                    'price' => $item['im_price'],
                ]);
                $product = Product::findOrFail($item['id']);
                // get average of  cost_price
                $costPrice = ($product->quantity * $product->cost_price + $item['count'] * $item['im_price'])/ ($product->quantity+ $item['count']);
                $product->update([
                    'quantity' => $product->quantity + $item['count'],
                    'cost_price' => $costPrice
                ]);
            }
            return ['status' => 1];
        } catch (Throwable $e) {
            return ['status' => 0];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
