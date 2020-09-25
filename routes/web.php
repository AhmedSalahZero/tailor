<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('front.index');
})->name('page.index');
// * login Routes

Route::get('login' , function() {
    return view('login.index');
})->name('login')->middleware('guest');
route::post('login','Auth\LoginController@action')->name('loginController');
// ** login route
//* Register routes
Route::get('register',function(){
   return view('register.index');
})->middleware('guest')->name('register.index');
Route::post('register' ,'Auth\RegisterController@action')->name('register.post')->middleware('guest');

// ** Register routes
route::get('home', function(){
    return view('front.index');
})->name('home');
//reset the password functionality [send the password in email if the user enter the email and his phone ]
// get all products
Route::resource('products' ,'Products\ProductController');
Route::post('mapping','Products\ProductController@mapping')->name('mapping');
Route::resource('cart' ,'Cart\CartController', [
    'parameters'=>[
        'cart'=>'ProductVariation'
    ]
])->middleware('auth');
// logout
Route::get('logout' , 'Auth\logoutController@logout')->middleware('adminOrUser')->name('logout');
// categories
Route::resource('categories' , 'Categories\CategoryController');
Route::get('category/{category}' , 'Categories\CategoryController@filter')->name('filter.category');
Route::get('category' , 'Categories\CategoryController@test')->name('test.test');
Route::POST('removeItem' , 'Cart\CartController@destroy')->name('cart.remove')->middleware('auth');

route::post('cart/deleteAll/' , 'cart\CartController@emptyTheCart')->middleware('auth')->name('cart.deleteAll');
Route::resource('/request' , 'Requests\RequestController');
//Route::get('contact' , '')
Route::get('/contact' , 'Requests\contactController@index')->name('contact.index');
Route::POST('/contact' , 'Requests\contactController@store')->name('contact.post');
Route::get('cart/checkout/payment' , 'Cart\CartController@checkoutView')->middleware('adminOrUser')->name('check.out');
Route::resource('orders' ,'Orders\OrderController');
Route::get('myOrders' ,'Orders\OrderController@show')->middleware('auth')->name('user.orders');
Route::get('myRequests','Requests\RequestController@myRequests')->middleware('auth')->name('my.requests');
Route::post('products/getVariationPrice','Products\ProductController@getProductVariationPrice')->name('getVarPrice');
Route::post('product/get_cart_num','Products\ProductController@getCartNum')->name('getNumCart');
