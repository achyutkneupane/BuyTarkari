<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\SiteSetting;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Login;
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
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/reset-password', ResetPassword::class)->name('resetPassword')->middleware('guest');
Route::get('/reset-password/{token}', ResetPasswordToken::class)->name('resetToken')->middleware('guest');
Route::get('/logout', [Controller::class,'logout'])->name('logout')->middleware('auth');
Route::get('/verify/{token}', [Controller::class,'verifyEmail'])->name('verifyEmail');

Route::get('/',LandingPage::class)->name('landing_page');

Route::prefix('/admin')->middleware('auth','admin')->group(function() {
    Route::get('/',Dashboard::class)->name('adminDashboard');
    Route::get('/setting', SiteSetting::class)->name('siteSettings');
});