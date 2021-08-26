<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\ProductPriceCustomer;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\DB;

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
                'short_desc' => $request->short_desc,
                'barcode' => $request->barcode,
                'quantity' => 0,
                'cost_price' => $request->cost_price ?? 0,
                'sell_price' => $request->sell_price,
                'thumbnail' => '/storage/' . $path,
                'count_per_box' => $request->count_per_box,
                'dvt' => $request->dvt,
                'count_per_box' => $request->count_per_box,
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
                    'short_desc' => $request->short_desc,
                    'barcode' => $request->barcode,
                    'sell_price' => $request->sell_price,
                    'thumbnail' => '/storage/' . $path,
                    'dvt' => $request->dvt,
                    'count_per_box' => $request->count_per_box,
                ]);
            } else {
                $product->update([
                    'name' => $request->name,
                    'short_desc' => $request->short_desc,
                    'barcode' => $request->barcode,
                    'sell_price' => $request->sell_price,
                    'dvt' => $request->dvt,
                    'count_per_box' => $request->count_per_box,
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
        // $configPrice = DB::table('customer_groups')
        //     ->join('product_price_customers', 'product_price_customers.group_id', '=', 'customer_groups.id')
        //     ->join('product_price_customers', 'product_price_customers.group_id', '=', 'customer_groups.id')
        //     ->get();

        $configPrice = DB::table('product_prices')
            ->where('product_id', $id)
            ->join('product_price_customers', 'product_price_customers.product_price_id', '=', 'product_prices.id')
            ->join('customer_groups', 'customer_groups.id', '=', 'product_price_customers.group_id')
            ->get();

        $product = Product::findOrFail($id);
        $groups = CustomerGroup::all();
        return view('products.priceset')
            ->with('product', $product)
            ->with('configPrice', $configPrice)
            ->with('groups', $groups);
    }

    public function postPrice(Request $request, $id)
    {
        $request->validate([
            "prices"    => "required|array|min:1",
            "prices.*"  => "required|numeric|distinct",
            "groups"    => "required|array|min:1",
            "groups.*"  => "required|numeric|distinct",
        ]);

        $product = Product::findOrFail($id);

        $ids = ProductPrice::where('product_id', $id)->pluck('id');
        ProductPriceCustomer::whereIn('product_price_id', $ids)->delete();
        ProductPrice::whereIn('id', $ids)->delete();
        
        foreach ($request->prices as $index => $price) {
            $pPrice = ProductPrice::create([
                'product_id' => $product->id,
                'price' => $price
            ]);
            ProductPriceCustomer::create([
                'product_price_id' => $pPrice->id,
                'group_id' => $request->groups[$index]
            ]);
        }

        return redirect()->route('products.index');
    }
}
