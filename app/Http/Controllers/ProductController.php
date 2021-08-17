<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    public function __construct(
        ProductRepository $product
    ) {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sell_price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            if ($request->file('thumbnail')) {
                $imagePath = $request->file('thumbnail');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
            }

            $this->product->create([
                'name' => $request->name,
                'category_id' => 1,
                'manufacturer' => $request->manufacturer,
                'barcode' => $request->barcode,
                'quantity' => 0,
                'cost_price' => $request->cost_price ?? 0,
                'sell_price' => $request->sell_price,
                'thumbnail' => '/storage/' . $path,
            ]);
        } catch (\Exception $e) {
            return abort(500, 'Something went wrong');
        }
        return redirect()->route('products.index');
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
        $product = Product::findOrFail($id);
        return view('products.edit')->withProduct($product);
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
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'sell_price' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            if ($request->file('thumbnail')) {
                if (file_exists(public_path($product->thumbnail))) {
                    unlink(public_path($product->thumbnail));
                }
                $imagePath = $request->file('thumbnail');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
                $product->update([
                    'name' => $request->name,
                    'manufacturer' => $request->manufacturer,
                    'barcode' => $request->barcode,
                    'sell_price' => $request->sell_price,
                    'thumbnail' => '/storage/' . $path,
                ]);
            } else {
                $product->update([
                    'name' => $request->name,
                    'manufacturer' => $request->manufacturer,
                    'barcode' => $request->barcode,
                    'sell_price' => $request->sell_price,
                ]);
            }
        } catch (\Exception $e) {
            return abort(500, 'Something went wrong');
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }

    public function priceSet($id)
    {
        $product = Product::findOrFail($id);
        return view('products.priceset')->with('product', $product);
    }
}
