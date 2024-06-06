<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function index(Request $req){
        $user = Auth::user();
        return view('pages.profile',['user'=>$user]);
    }
    // public function listorder(){
    //     $user = Auth::user();
    //     $id= $user->CUSTOMER_ID;
    //     $list_order = Order::where('customer_id', $id)->get();
    //     //var_dump($order_list);
    //     return view('pages.myorder',['user'=>$user,'list_order'=>$list_order]);
    // }
    public function listorder(Request $request) {
        $user = Auth::user();
        $id = $user->CUSTOMER_ID;

        // Get the search query from the request
        $search = $request->search;

        // Query the orders based on the search query
        $list_order = Order::where('customer_id', $id)
            ->when($search, function ($query, $search) {
                return $query->where('ADDRESS', 'like', '%' . $search . '%');
            })
            ->get();

        return view('pages.myorder', ['user' => $user, 'list_order' => $list_order]);
    }

    public function update(Request $req,$id){
            $user = Customer::find($id);

            if ($req->filled('email')) {
                $user->EMAIL = $req->email;
            }

            if ($req->filled('password')) {
                $user->PASSWORD = $req->password;
            }
            if($req->filled('phone')){
                $user->PHONE_NUMBER = $req->phone;
            }
            if ($req->hasFile('avatar')) {
                if (!Storage::disk('public')->exists('avatars')) {
                    Storage::disk('public')->makeDirectory('avatars');
                }
                $avatarPath = $req->file('avatar')->store('avatars', 'public');
                $user->AVATAR = $avatarPath;
            }

            if ($req->filled('PROVINCE')) {
                $user->PROVINCE = $req->PROVINCE;
            }

            if ($req->filled('CITY')) {
                $user->CITY = $req->CITY;
            }

            if ($req->filled('ADDRESS')) {
                $user->ADDRESS = $req->ADDRESS;
            }

            $user->save();

            return redirect()->back()->with('succes','Update thành công');

    }
    public function updatePass(Request $req, $id){
        $user = Customer::find($id);
        if($req->old_pass != $user->PASSWORD) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác');
        }
        if($req->new_pass != $req->cf_new_pass)
        {
            return redirect()->back()->with('error', 'Xác nhận mật khẩu không chính xác');
        }
        $user->PASSWORD = $req->new_pass;
        $user->save();
        return redirect()->back()->with('succes','Update thành công');
    }
}
