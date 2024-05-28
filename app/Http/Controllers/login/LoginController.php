<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login.login');
    }
    public function postLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        // Xác thực thất bại
        return redirect()->back()->with('err','Sai thong tin');
    }
    public function postRegister(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:customer',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Customer::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cart_id' =>0,
            'wishlist_id' =>0,
        ]);

        $cart = Cart::create([
            'CUSTOMER_ID' => $user->CUSTOMER_ID,
        ]);
        $wishlist= Wishlist::create([
            'CUSTOMER_ID' => $user->CUSTOMER_ID,
        ]);
        $user->cart_id = $cart->id;
        $user->wishlist_id = $wishlist->id;
        $user->save();

        Auth::login($user);
        return redirect()->intended('/admin/dashboard');
    }
    public function Logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        // Xác thực thất bại
        return redirect()->back();
    }
}
