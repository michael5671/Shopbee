<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NumberFormatter;


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
    public function Dashboard(){
        $formatter = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        $totalSales = round(DB::selectOne("SELECT calculate_total_sales_last_30_days() AS total_sales")->total_sales);
        $totalSalesCompare = $totalSales-round(DB::selectOne("SELECT calculate_total_sales_previous_30_days() AS total_sales")->total_sales) ;
        $totalOrders = DB::selectOne("SELECT calculate_total_orders_last_30_days() AS total_orders")->total_orders;
        $totalOrdersCompare = $totalOrders-DB::selectOne("SELECT calculate_total_orders_previous_30_days() AS total_orders")->total_orders ;
        $totalCustomers = DB::selectOne("SELECT calculate_total_customers_last_30_days() AS total_customers")->total_customers;
        $totalCustomersCompare = $totalCustomers-DB::selectOne("SELECT calculate_total_customers_previous_30_days() AS total_customers")->total_customers ;

        $months = [];
        $revenues = [];
        $orderCounts = [];
        $memberCounts = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('m/Y');

            $revenues[] = DB::selectOne(
                "SELECT SUM(total_price) AS total
                 FROM `order`
                 WHERE MONTH(ORDER_DATE) = ? AND YEAR(ORDER_DATE) = ?",
                [$month->month, $month->year]
            )->total;

            $orderCounts[] = DB::selectOne(
                "SELECT COUNT(*) AS total
                 FROM `order`
                 WHERE MONTH(ORDER_DATE) = ? AND YEAR(ORDER_DATE) = ?",
                [$month->month, $month->year]
            )->total;

            $memberCounts[] = DB::selectOne(
                "SELECT COUNT(*) AS total
                 FROM `customer`
                 WHERE MONTH(JOINING_DATE) = ? AND YEAR(JOINING_DATE) = ?",
                [$month->month, $month->year]
            )->total;
        }

            $data = [
                'labels' => $months, // Mảng chứa các tháng
                'datasets' => [
                    [
                        'label' => 'Doanh thu (VND)',
                        'type' => 'bar',
                        'data' => $revenues, // Mảng chứa doanh thu tương ứng với từng tháng
                    ],
                    [
                        'label' => 'Số lượng đơn hàng',
                        'type' => 'line',
                        'data' => $orderCounts, // Mảng chứa số lượng đơn hàng tương ứng với từng tháng
                    ],
                    [
                        'label' => 'Số lượng thành viên',
                        'type' => 'line',
                        'data' => $memberCounts, // Mảng chứa số lượng thành viên tương ứng với từng tháng
                    ]
                ]
            ];
        return view('Admin.Dashboard',compact('totalSales','totalSalesCompare','formatter','totalOrders','totalOrdersCompare','totalCustomers','totalCustomersCompare','data'));
    }
    public function CustomerContext($customer)
    {
        return view('admin/CustomerContext', compact('customer'));
    }
    public function OrderContext($order_id)
    {
        $order = DB::table('order')->where('order_id', $order_id)->first();
        $customer = DB::table('customer')->where('customer_id', $order->CUSTOMER_ID)->first();
        $order_item = DB::table('order_item')->where('order_id', $order_id)->get();
        $bookImages= array();
        foreach ($order_item as $item) {
            $bookImages[$item->BOOK_ID][] = DB::table('book_image')->select('IMAGE_LINK')->where('book_id', $item->BOOK_ID)->first();
            $bookImages[$item->BOOK_ID][] = DB::table('book')->select('NAME')->where('book_id', $item->BOOK_ID)->first();
        }
        return view('admin/OrderContext', compact('order','customer','bookImages','order_item'));
    }
}
