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




