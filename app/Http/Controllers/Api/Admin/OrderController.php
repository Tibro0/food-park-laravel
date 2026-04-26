<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function pendingOrderIndex()
    {
        $orders = Order::with(['user:id,name'])->where('order_status', 'pending')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function inProcessOrderIndex()
    {
        $orders = Order::with(['user:id,name'])->where('order_status', 'in_process')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function deliveredOrderIndex()
    {
        $orders = Order::with(['user:id,name'])->where('order_status', 'delivered')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function declinedOrderIndex()
    {
        $orders = Order::with(['user:id,name'])->where('order_status', 'declined')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function show($id)
    {
        $order = Order::with(['userAddress', 'deliveryArea', 'orderItems'])->find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $order
        ], 200);
    }

    public function orderStatusUpdate(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_status' => 'required|in:PENDING,COMPLETED',
            'order_status' => 'required|in:pending,in_process,delivered,declined'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $order = Order::find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;
        $order->save();

        return response()->json([
            'status' => 200,
            'message' => 'Order Status Updated!'
        ], 200);
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        $order->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
