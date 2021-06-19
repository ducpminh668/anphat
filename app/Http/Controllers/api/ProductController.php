<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Validator;

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
        return $this->product->paginate(['images']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'manufacturer' => 'required',
            'batch_code' => 'required',
            'barcode' => 'required',
            'quantity' => 'required',
            'cost_price' => 'required',
            'sell_price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_images.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            if ($request->file('thumbnail')) {
                $imagePath = $request->file('thumbnail');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
            }

            $this->product->create([
                'name' => $request->name,
                'manufacturer' => $request->manufacturer,
                'batch_code' => $request->batch_code,
                'barcode' => $request->barcode,
                'quantity' => $request->quantity,
                'cost_price' => $request->cost_price,
                'sell_price' => $request->sell_price,
                'thumbnail' => '/storage/' . $path,
            ]);
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
        return ['status' => 1, 'message' => 'Thành công'];
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
