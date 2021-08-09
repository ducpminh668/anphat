<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductImageRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Traits\Filterable;

class ProductController extends Controller
{
    use Filterable;

    protected $filterable = [
        'name'
    ];

    public function __construct(
        ProductRepository $product,
        ProductImageRepository $productImage
    ) {
        $this->product = $product;
        $this->productImage = $productImage;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return \App\Models\Product::where('name', 'like', '%' . $request->name . '%')->paginate(30);
    }

    public function filter(Request $request)
    {
        try {
            $orders = \App\Models\Product::filter($request)->get();
            return ['status' => 1, 'data' => $orders];
        } catch (\Exception $e) {
            return ['status' => 0, 'error' => $e->getMessage()];
        }
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

    public function storeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
            'images.*.' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2024'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }
        $product = $this->product->find($request->product_id);

        if (!$product) {
            return ['status' => 0, 'message' => 'Not found'];
        }

        $successData = [];

        if ($request->images) {
            $files = $request->images;
            foreach ($files as $file) {
                $imageName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $imageName, 'public');
                $successData[] = $this->productImage->create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }
        }

        return ['status' => 1, 'message' => $successData];
    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        if (!$this->productImage->delete($request->id)) {
            return ['status' => 0, 'data' => 'Not found'];
        }
        return ['status' => 1, 'data' => $request->id];
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
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // 'product_images.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
        $product = $this->product->find($id, ['images']);
        if ($product) {
            return ['status' => 1, 'data' => $product];
        }
        return ['status' => 0, 'message' => 'Not Found'];
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'manufacturer' => 'required',
            'batch_code' => 'required',
            'barcode' => 'required',
            'quantity' => 'required',
            'cost_price' => 'required',
            'sell_price' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            if ($request->file('thumbnail')) {
                $product = $this->product->find($id);
                // If have thumbnail file, remove old file
                if (file_exists(public_path($product->thumbnail))) {
                    unlink(public_path($product->thumbnail));
                }
                $imagePath = $request->file('thumbnail');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
                $this->product->update($id, [
                    'name' => $request->name,
                    'manufacturer' => $request->manufacturer,
                    'batch_code' => $request->batch_code,
                    'barcode' => $request->barcode,
                    'quantity' => $request->quantity,
                    'cost_price' => $request->cost_price,
                    'sell_price' => $request->sell_price,
                    'thumbnail' => '/storage/' . $path,
                ]);
            } else {
                // If not have thumbnail file
                $this->product->update($id, [
                    'name' => $request->name,
                    'manufacturer' => $request->manufacturer,
                    'batch_code' => $request->batch_code,
                    'barcode' => $request->barcode,
                    'quantity' => $request->quantity,
                    'cost_price' => $request->cost_price,
                    'sell_price' => $request->sell_price
                ]);
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
        return ['status' => 1, 'message' => 'success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        $product = $this->product->find($id);

        if ($product) {
            \App\Models\ProductImage::where('product_id', $product->id)->delete();
            $this->product->delete($id);
            return ['status' => 1, 'data' => $id];
        }

        return ['status' => 0, 'message' => 'Not found'];
    }
}
