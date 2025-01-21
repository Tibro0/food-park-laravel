<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\InProcessOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable){
        return $dataTable->render('admin.order.index');
    }

    public function pendingOrderIndex(PendingOrderDataTable $dataTable){
        return $dataTable->render('admin.order.pending-order-index');
    }

    public function inProcessOrderIndex(InProcessOrderDataTable $dataTable){
        return $dataTable->render('admin.order.inprocess-order-index');
    }

    public function deliveredOrderIndex(DeliveredOrderDataTable $dataTable){
        return $dataTable->render('admin.order.delivered-order-index');
    }

    public function declinedOrderIndex(DeclinedOrderDataTable $dataTable){
        return $dataTable->render('admin.order.declined-order-index');
    }

    public function getOrderStatus(string $id){
        $order = Order::select(['order_status', 'payment_status'])->findOrFail($id);

        return response($order);
    }

    public function show($id){
        $order = Order::with(['userAddress', 'deliveryArea', 'orderItems'])->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function orderStatusUpdate(Request $request, string $id){
        $request->validate([
            'payment_status' => ['required', 'in:PENDING,COMPLETED'],
            'order_status' => ['required', 'in:pending,in_process,delivered,declined']
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;
        $order->save();

        if ($request->ajax()) {
            return response(['message' => 'Order Status Updated!']);
        }else{
            toastr()->success('Status Updated Successfully!');
            return redirect()->back();
        }

        toastr()->success('Status Updated Successfully!');
        return redirect()->back();
    }

    public function destroy(string $id){
        $order = Order::findOrFail($id);
        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
