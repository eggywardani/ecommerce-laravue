<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::with('order_items.product.brand', 'order_items.product.category')->get();
        return inertia('User/Dashboard', ['orders' => $orders]);
    }
}
