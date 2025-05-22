<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMenTask;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();


        return view('admin.orders.index', ['orders' => $orders, 'pageTitle' => "Orders"]);
    }

}