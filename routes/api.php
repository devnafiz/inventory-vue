<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signup');

});

Route::ApiResource('/employee','Api\EmployeeController');
Route::ApiResource('/supplier','Api\SupplierController');
Route::ApiResource('/category','Api\CategoryController');
Route::ApiResource('/product','Api\ProductController');
Route::ApiResource('/expense','Api\ExpenseController');
Route::ApiResource('/customer','Api\CustomerController');

Route::post('/salary/paid/{id}','Api\SalaryController@paid');

Route::get('/salary','Api\SalaryController@allSalary');
Route::get('/salary/view/{id}','Api\SalaryController@viewSalary');
Route::get('/edit/salary/{id}','Api\SalaryController@editSalary');

Route::post('/salary/update/{id}','Api\SalaryController@updateSalary');
//stock
Route::post('/stock/update/{id}','Api\ProductController@stockUpdate');

//getting products
Route::get('/getting/product/{id}','Api\PosController@getProduct');


//add to cart
Route::get('/addTocart/{id}','Api\CartController@AddToCart');
Route::get('/cart/product','Api\CartController@cartProduct');
//remove  cart
Route::get('/remove/cart/{id}','Api\CartController@removeCart');

Route::get('/increment/{id}','Api\CartController@increment');
Route::get('/decrement/{id}','Api\CartController@decrement');

Route::get('/vats','Api\CartController@getVat');

//pos


Route::get('/orders','Api\OrderController@TodayOrder');

Route::post('/orderdone','Api\PosController@orderDone');

Route::get('/order/details/{id}','Api\OrderController@orderDetails');

Route::get('/order/orderdetails/{id}','Api\OrderController@orderDetailsAll');
Route::post('/search/order','Api\PosController@searchOrderDate');







