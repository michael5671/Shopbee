<?php

use App\Http\Controllers\login\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login',[App\Http\Controllers\login\LoginController::class,'logon'])->name('login');
Route::post('/login',[App\Http\Controllers\login\LoginController::class,'postLogin'])->name('post.login');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [LoginController::class, 'showLoginForm'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('post.register');





Route::get('/logout',[App\Http\Controllers\login\LoginController::class,'Logout'])->name('logout');

Route::get('/test',[\App\Http\Controllers\test::class,'index']);



Route::prefix('admin')->middleware(\App\Http\Middleware\MainAuthenticate::class)->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\admin\AdminController::class,'Dashboard'])->name('dashboard');
    Route::get('/customers', [App\Http\Controllers\admin\AdminController::class, 'Customers'])->name('customers');
    Route::get('/customers/{customer}', [\App\Http\Controllers\admin\AdminController::class, 'CustomerContext'])->name('customers.show');
    Route::get('/orders', [App\Http\Controllers\admin\AdminController::class, 'Orders'])->name('orders');
    Route::get('/orders/{order_id}', [\App\Http\Controllers\admin\AdminController::class, 'OrderContext'])->name('orders.show');
    Route::get('/product_management', [App\Http\Controllers\admin\BookController::class, 'index'])->name('product_management');
    Route::get('/create', [App\Http\Controllers\admin\BookController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\admin\BookController::class, 'store'])->name('store');
    Route::get('/{book}/edit', [App\Http\Controllers\admin\BookController::class, 'edit'])->name('edit');
    Route::post('/book/{book}', [App\Http\Controllers\admin\BookController::class, 'update'])->name('update');
    Route::delete('/{book}/delete', [App\Http\Controllers\admin\BookController::class, 'delete'])->name('delete');
});



/*=================BOOK DETAIL========================= */
use App\Http\Controllers\bookDetail\bookDetailController;
Route::get('/bookDetail/{book_id}', [App\Http\Controllers\bookDetail\bookDetailController::class, 'bookDetail']);
Route::get('/bookDetail/{customer_id}/{book_id}', [App\Http\Controllers\bookDetail\bookDetailCustomerController::class, 'bookDetailCustomer']);

use App\Http\Controllers\bookDetail\bookDetailCustomerController;
Route::post('/insert-rating', [App\Http\Controllers\bookDetail\bookDetailCustomerController::class, 'insert_rating']);


/*=================HOME========================== */
use App\Http\Controllers\homeController;
Route::get('/', [homeController::class, 'home'])->name('home');

/*=================Shop========================== */
Route::get('/shop', [App\Http\Controllers\shop\ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/filter', [App\Http\Controllers\shop\ShopController::class, 'filter'])->name('shop.filter');
Route::post('/shop/search', [App\Http\Controllers\shop\ShopController::class, 'search'])->name('shop.search');
Route::post('/shop/add', [App\Http\Controllers\shop\ShopController::class, 'add'])->name('shop.add');

/*=================CART========================== */
Route::get('/cart', [App\Http\Controllers\cart\CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/update/{itemId}', [App\Http\Controllers\cart\CartController::class, 'updateCartItem'])->name('cart.update');
Route::delete('/cart/remove/{itemId}', [App\Http\Controllers\cart\CartController::class, 'removeFromCart'])->name('cart.remove');