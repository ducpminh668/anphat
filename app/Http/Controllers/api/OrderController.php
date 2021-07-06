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
        return $this->order->paginate(['details', 'customer'], 5);
    }

    /**
     * Display a filter of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        try {
            $orders = \App\Models\Order::filter($request)->get();
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

    public function deleteOrderDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        if (!$this->orderDetail->delete($request->id)) {
            return ['status' => 0, 'message' => 'Not found'];
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
        $order = $this->order->find($id, ['details', 'customer']);
        if (!$order) {
            return ['status' => 0, 'message' => 'NotFound'];
        }
        return ['status' => 1, 'data' => $order];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->order->find($id);
        if ($order) {
            return ['status' => 1, 'data' => $order];
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
            $flag = $this->order->update($id, [
                'phone' => $request->phone,
                'address' => $request->address,
                'contact_name' => $request->contact_name,
                'user_id' => auth()->user()->id,
                'customer_id' => $request->customer_id,
                'total' => $request->total
            ]);

            if ($flag) {
                foreach ($request->orderDetail as $key => $item) {
                    $this->orderDetail->create([
                        'order_id' => $id,
                        'product_name' => $item['product_name'],
                        'sell_price' => $item['sell_price'],
                        'discount_price' => $item['discount_price'],
                        'quantity' => $item['quantity'],
                    ]);
                }
                return ['status' => 1, 'message' => 'Thành công'];
            } else {
                return ['status' => 0, 'message' => 'Not found'];
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
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

        if (!$this->order->delete($id)) {
            return ['status' => 0, 'message' => 'Not found'];
        }
        return ['status' => 1, 'data' => $id];
    }
}
