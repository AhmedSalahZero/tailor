<?php



use Illuminate\Support\Facades\Route;

// all auth middleware  ;

Route::middleware(['auth:admin'])->group(function(){
    Route::get('adminPanel' , 'Admins\AdminPanelController@index')->name('admin.index');
    Route::get('adminPanel/users','Admins\AdminPanelController@getUsers')->name('admin.users');
    Route::delete('adminPanel/users','Admins\AdminPanelController@deleteUser')->name('admin.delete.user');
    Route::get('adminPanel/users/Edit/{user}','Admins\AdminPanelController@editUser')->name('admin.users.edit');
    Route::PUT('adminPanel/users/Edit/user/update','Admins\AdminPanelController@updateUser')->name('admin.users.update');
    Route::get('adminPanel/users/add','Admins\AdminPanelController@addUser')->name('admin.add.user');
    Route::POST('adminPanel/users/add','Admins\AdminPanelController@storeUser')->name('admin.store.user');
    Route::get('adminPanel/admins','Admins\AdminPanelController@getAdmins')->name('admins.index');
    Route::delete('adminPanel/admins','Admins\AdminPanelController@deleteAdmin')->name('admin.delete.admin');
    Route::get('adminPanel/admins/Edit/{admin}','Admins\AdminPanelController@editAdmin')->name('admin.edit.admin');
    Route::PUT('adminPanel/admins/Edit/admin/update','Admins\AdminPanelController@updateAdmin')->name('admin.update.admin');
    Route::get('adminPanel/admins/add','Admins\AdminPanelController@addAmin')->name('admin.add');
    Route::POST('adminPanel/admins/add','Admins\AdminPanelController@storeAdmin')->name('admin.store.admin');
    Route::get('adminPanel/orders','Admins\AdminPanelController@getOrders')->name('admin.orders');
    Route::get('adminPanel/order/{order}','Admins\AdminPanelController@getOrder')->name('get.single.order');
    Route::get('adminPanel/users/{user}','Admins\AdminPanelController@getUser')->name('get.user.single');

    Route::post('adminPanel/orders/changeStatus','Admins\AdminPanelController@changedToCompleted')->name('mark.complete');
    Route::post('adminPanel/requests/changeStatus','Admins\AdminPanelController@changeRequestStatus')->name('request.complete');
    Route::post('adminPanel/requests/reject','Admins\AdminPanelController@rejectRequest')->name('request.reject');
    Route::get('adminPanel/requests','Admins\AdminPanelController@getCustomerRequests')->name('customer.requests');
    Route::get('adminPanel/request/{user}','Admins\AdminPanelController@getCustomerRequest')->name('customer.request');

    Route::get('adminPanel/messages','Admins\AdminPanelController@getCustomerMessages')->name('customer.messages');
    Route::post('adminPanel/messages','Admins\AdminPanelController@markMessageRead')->name('message.read');
    Route::post('adminPanel/message/delete','Admins\AdminPanelController@deleteMessage')->name('message.delete');
    Route::get('adminPanel/transactions','Admins\AdminPanelController@getUsersTransactions')->name('users.transactions');
    Route::get('adminPanel/transaction/user/{user}','Admins\AdminPanelController@getUserTransactions')->name('user.transactions');
    Route::get('adminPanel/products','Admins\AdminPanelController@getProducts')->name('admin.products');
    Route::get('adminPanel/products/Edit/{productVariation}','Admins\AdminPanelController@editProduct')->name('product.edit');
    Route::post('adminPanel/product/update','Admins\AdminPanelController@updateProduct')->name('products.update');
    Route::get('adminPanel/products/add','Admins\AdminPanelController@addProduct')->name('admin.add.product');
    Route::POST('adminPanel/products/add','Admins\AdminPanelController@storeProduct')->name('admin.store.product');


});
