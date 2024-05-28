<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Customers(){
        $customers = DB::table('customer')->paginate(15);
        $size=count(DB::table('customer')->get());
        return view('Admin.Customers',['customers'=>$customers,'size'=>$size]);
    }
    public function Orders(){
        $orders = DB::table('order')->paginate(15);
        $size=count(DB::table('order')->get());
        return view('Admin.Orders',['orders'=>$orders,'size'=>$size]);
    }
    public function CustomerContext(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
