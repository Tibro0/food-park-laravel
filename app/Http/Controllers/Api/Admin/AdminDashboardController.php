<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $todaysOrders = Order::whereDate('created_at', now()->format('Y-m-d'))->count();
        $todaysEarnings = Order::whereDate('created_at', now()->format('Y-m-d'))->where('order_status', 'delivered')->sum('grand_total');

        $thisMonthsOrders = Order::whereMonth('created_at', now()->month)->count();
        $thisMonthsEarnings = Order::whereMonth('created_at', now()->month)->where('order_status', 'delivered')->sum('grand_total');

        $thisYearOrders = Order::whereYear('created_at', now()->year)->count();
        $thisYearEarnings = Order::whereYear('created_at', now()->year)->where('order_status', 'delivered')->sum('grand_total');

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status', 'delivered')->sum('grand_total');

        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalProducts = Product::count();
        $totalBlogs = Blog::count();

        return response()->json([
            'status' => 200,
            'data' => [
                'todaysOrders' => $todaysOrders,
                'todaysEarnings' => $todaysEarnings,
                'thisMonthsOrders' => $thisMonthsOrders,
                'thisMonthsEarnings' => $thisMonthsEarnings,
                'thisYearOrders' => $thisYearOrders,
                'thisYearEarnings' => $thisYearEarnings,
                'totalOrders' => $totalOrders,
                'totalEarnings' => $totalEarnings,
                'totalUsers' => $totalUsers,
                'totalAdmins' => $totalAdmins,
                'totalProducts' => $totalProducts,
                'totalBlogs' => $totalBlogs
            ]
        ]);
    }
}
