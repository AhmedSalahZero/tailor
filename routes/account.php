<?php



use Illuminate\Support\Facades\Route;

// all auth middleware  ;

Route::middleware('auth')->group(function(){
    Route::get('edit/account' , 'Accounts\AccountController@index')->name('edit.account');
    Route::post('edit/account' , 'Accounts\AccountController@store')->name('edit.info.store');
    Route::PUT('edit/account' , 'Accounts\AccountController@changePassword')->name('edit.password.store');

});
