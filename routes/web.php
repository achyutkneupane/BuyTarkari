<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Dashboard\AddProduct;
use App\Http\Livewire\Admin\Dashboard\Brands;
use App\Http\Livewire\Admin\Dashboard\Categories;
use App\Http\Livewire\Admin\Dashboard\Products;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Login;
use App\Http\Livewire\Page\ViewCart;
use App\Http\Livewire\Page\ViewCategory;
use App\Http\Livewire\Page\ViewItem;
use App\Http\Livewire\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ResetPasswordToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/cart', ViewCart::class)->name('viewCart');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/reset-password', ResetPassword::class)->name('resetPassword')->middleware('guest');
Route::get('/reset-password/{token}', ResetPasswordToken::class)->name('resetToken')->middleware('guest');
Route::get('/logout', [Controller::class,'logout'])->name('logout')->middleware('auth');
Route::get('/verify/{token}', [Controller::class,'verifyEmail'])->name('verifyEmail');
Route::get('/item/{slug}', ViewItem::class)->name('viewItem');
Route::get('/category/{slug}', ViewCategory::class)->name('viewCategory');

Route::get('/',LandingPage::class)->name('landing_page');

Route::prefix('/panel')->middleware('auth','admin')->group(function() {
    Route::get('/',Dashboard::class)->name('adminDashboard');
    Route::get('/products',Products::class)->name('adminProducts');
    Route::get('/products/add',AddProduct::class)->name('adminAddProduct');
    Route::get('/brands',Brands::class)->name('adminBrands');
    Route::get('/categories',Categories::class)->name('adminCategories');
});