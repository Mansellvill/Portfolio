<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('status', 1)->get();
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order) {
        return view('auth.orders.show', compact('order'));
    }
}
