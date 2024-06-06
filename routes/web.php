<?php

use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
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



Route::prefix('admin')->middleware(['main.auth','admin.auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\admin\AdminController::class,'Dashboard'])->name('dashboard');
    Route::get('/customers', [App\Http\Controllers\admin\AdminController::class, 'Customers'])->name('customers');
    Route::get('/customers/{customer}', [\App\Http\Controllers\admin\AdminController::class, 'CustomerContext'])->name('customers.show');
    Route::get('/orders', [App\Http\Controllers\admin\AdminController::class, 'Orders'])->name('orders');
    Route::get('/orders/{order_id}', [\App\Http\Controllers\admin\AdminController::class, 'OrderContext'])->name('orders.show');
});



/*=================BOOK DETAIL========================= */
use App\Http\Controllers\bookDetail\bookDetailController;

Route::get('/book/{book_id}', [App\Http\Controllers\bookDetail\bookDetailController::class, 'bookDetail'])->name('book.detail.guest');
Route::get('/book/user/{book_id}', [App\Http\Controllers\bookDetail\bookDetailCustomerController::class, 'bookDetailCustomer'])->name('book.detail.user');
Route::get('/book/{book_id}/route', [App\Http\Controllers\bookDetail\bookDetailController::class, 'index'])->name('book.detail');

use App\Http\Controllers\bookDetail\bookDetailCustomerController;
Route::post('/insert-rating', [App\Http\Controllers\bookDetail\bookDetailCustomerController::class, 'insert_rating']);


/*=================HOME========================== */
use App\Http\Controllers\homeController;
Route::get('/', [homeController::class, 'home'])->name('home');


Route::middleware(['main.auth','user.auth'])->group(function () {
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/profile/order',[ProfileController::class,'listorder'])->name('profile.order');
Route::post('/profile/update/{id}',[ProfileController::class,'update']);
Route::post('/profile/update_pass/{id}',[ProfileController::class,'updatePass']);
});

Route::get('/payment/index', [PaymentController::class, 'index']);
Route::post('/payment/submit', [PaymentController::class, 'submit']);

