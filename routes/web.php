<?php

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

Route::get('/', function () {
    return view('front-end.landing');
});
Route::get('/test', function () {
    return view('users.dashboard.test');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware' => ['auth:sanctum','verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('redeem-users', 'App\Http\Controllers\Admin\ReedemController@verify')->name('redeemverify');
});
Route::group(['middleware' => ['auth:sanctum','verified'], 'prefix' => 'u', 'as' => 'user.'], function () {
    Route::get('verify', 'App\Http\Controllers\Users\VerifyController@verify')->name('checkverify');
    Route::post('verify', 'App\Http\Controllers\Users\VerifyController@otpverify')->name('otpverify');
    Route::resource('couponcode', 'App\Http\Controllers\Users\CouponcodeController');
});
