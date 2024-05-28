<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Customers(){
        $customers = Customer::all();
        $size = count($customers);
        return view('Admin.Customers',['customers'=>$customers]);
    }
    public function Orders(){
        $orders = Order::all();
        return view('Admin.Orders',['orders'=>$orders]);
    }
}
