<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepository;
use App\Repositories\OrderDetail\OrderDetailRepository;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct(
        OrderRepository $order,
        OrderDetailRepository $orderDetail
    ) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'phone' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'customer_id' => 'required',
            'orderDetail.*.product_name' => 'required',
            'orderDetail.*.sell_price' => 'required',
            'orderDetail.*.discount_price' => 'required',
            'orderDetail.*.quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            $order = $this->order->create([
                'phone' => $request->phone,
                'address' => $request->address,
                'contact_name' => $request->contact_name,
                'user_id' => auth()->user()->id,
                'customer_id' => $request->customer_id,
                'total' => $request->total
            ]);

            foreach ($request->orderDetail as $key => $item) {
                $this->orderDetail->create([
                    'order_id' => $order->id,
                    'product_name' => $item['product_name'],
                    'sell_price' => $item['sell_price'],
                    'discount_price' => $item['discount_price'],
                    'quantity' => $item['quantity'],
                ]);
            }
            return ['status' => 1, 'message' => 'Thành công'];
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
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
