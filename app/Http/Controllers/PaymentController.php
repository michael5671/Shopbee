<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartHas;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $cartId = Auth::user()->CART_ID;
        $customer = Auth::user();
        $cartHas = DB::select('CALL get_cart_items_by_cart_id(?)', [$cartId]);

        return response()->view('payment.index', [
            'cartHas' => $cartHas,
            'customer' => $customer,
            'cartId' => $cartId,
        ]);
    }

    public function submit(Request $request)
    {
        $cartId = Auth::user()->CART_ID;
        $customer = Auth::user();
        $cartHas = DB::select('CALL get_cart_items_by_cart_id(?)', [$cartId]);
        $order = Order::newDefault();
        $errors = $order->saveFromRequest($request);
        if (!$errors->isEmpty()) {
            return response()->view('payment.form', [
                'order' => $order,
                'errors' => $errors,
                'cartHas' => $cartHas,
                'customer' => $customer,
                'cartId' => $cartId,
            ], 400);
        }
        $maxOrderId = DB::table('order')->max('ORDER_ID');
        DB::statement("CALL create_order_items_and_clear_cart(?,?)",[$customer->CUSTOMER_ID,$maxOrderId]);
        return response()->json([
            'status' => "OK",
            'message' => "Đặt hàng thành công!"
        ], 200);
    }
}
