<?php

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


Auth::routes(['verify' => true]);

Route::middleware(['admin'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('admin-categories', 'Admin\CategoryController');
    Route::resource('admin-products', 'Admin\ProductController');
    Route::resource('admin-order', 'Admin\OrderController');
    Route::get('order/success/{id}', 'Admin\OrderController@successOrder');
    Route::resource('admin-profile', 'Admin\ProfileController');
    Route::post('admin-profile/password-update/{id}', 'Admin\ProfileController@passwordUpdate');
    Route::resource('admin-contact', 'Admin\ContactController');
    Route::resource('user-contact', 'Admin\UserMessageController');
    Route::resource('admin-transaction', 'Admin\TransactionController');
    Route::resource('admin-user', 'Admin\UserController');
    Route::resource('setting', 'Admin\SettingController');
    Route::resource('sliders', 'Admin\SliderController');
    Route::resource('admin-withdraw', 'Admin\WithdrawController');
    //Route::resource('user-messages', 'Admin\UserMessageController');

    Route::get('pending/destroy/{id}', 'Admin\OrderController@pendingDestroy');

});


Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', 'Fontend\ProductController@index')->name('fontend');

Route::resource('fontend-products', 'Fontend\ProductController');
Route::get('products/{slug}', 'Fontend\ProductController@products');

Route::get('fontend-login','Fontend\LoginController@showLogin')->name('show-login');
Route::post('font-login','Fontend\LoginController@checkLogin')->name('check-login');


Route::get('fontend-register','Fontend\RegisterController@showRegister')->name('show-register');
Route::post('user-register','Fontend\RegisterController@register')->name('register');

Route::get('fontend-cart','Fontend\CartController@index')->name('show-cart');
Route::resource('carts','Fontend\CartController');
Route::post('carts/store2','Fontend\CartController@store2');


Route::resource('account','Fontend\AccountController')->middleware('user');
Route::resource('checkout','Fontend\CheckoutController')->middleware('user');
Route::resource('profile','Fontend\ProfileController')->middleware('user');

Route::resource('contacts','Fontend\ContactController');

Route::get('user-message/{id}', 'Admin\UserMessageController@messageList')->middleware('user');
Route::get('show/message/{id}', 'Admin\UserMessageController@showMessage')->middleware('user');

Route::resource('fontend-categories', 'Fontend\CategoryController');
Route::resource('fontend-withdraw', 'Fontend\WithdrawController');
Route::resource('fontend-transfer', 'Fontend\TransferController');
