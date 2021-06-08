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

Auth::routes();
//Admin Login Route
// Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('admin-login', 'Auth\LoginController@showLoginForm');
Route::get('admin-logout', 'Auth\LoginController@logout');
//Employee Login Route
Route::get('employees-login', 'Auth\EmployeeController@showLoginForm');
Route::post('employees-login', 'Auth\EmployeeController@login')->name('employees-login');
Route::get('employee-logout', 'Auth\EmployeeController@logout');

//Customer Login Route
Route::get('/', 'Auth\CustomerLoginController@showLoginForm');
Route::post('customers-login', 'Auth\CustomerLoginController@login')->name('customers-login');
Route::get('verify-otp', 'Auth\CustomerLoginController@otpValidation');
Route::post('otp-validation', 'Auth\CustomerLoginController@verifyOTP')->name('otp-validation');
Route::get('customers-logout', 'Auth\CustomerLoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('departments', 'DepartmentController');
    Route::post('get-district', 'UserController@get_district');
    Route::post('check_username', 'UserController@check_username');

    Route::post('get-sales-user', 'UserController@getSalesUser');
});
//customer routes
Route::get('customer-dashboard', 'CustomerController@dashboard');

//Add Stocks //
Route::get('/stock', 'StockController@index');
Route::post('/addstock', 'StockController@store');
Route::get('/edit/{stock_id}', 'StockController@edit');
Route::post('/editstock', 'StockController@update');
Route::delete('/dele/{stock_id}', 'StockController@destroy');

//Add Suppliers //
Route::get('/supplier', 'SupplierController@index');
Route::post('/addsupplier', 'SupplierController@store');
//Route::get('/editsupplier/{supplier_id}', 'SupplierController@editsupplier');

Route::get('/editsu/{supplier_id}', 'SupplierController@edit');
Route::post('/editsupplier', 'SupplierController@update');
//Route::post('/editsupplier/{supplier_id}', 'SupplierController@update');
Route::delete('/deles/{supplier_id}', 'SupplierController@destroy');

//Add Inventories
Route::get('/inventories', 'InventoriesController@index');
Route::post('/addinven', 'InventoriesController@store');
Route::get('/editi/{inventory_id}', 'InventoriesController@edit');
Route::post('/editinven', 'InventoriesController@update');
Route::post('/delei/{inventory_id}', 'InventoriesController@destroy');

//Add Product
Route::get('/product', 'ProductsController@index');
Route::post('/addpro', 'ProductsController@store');
Route::get('/editp/{product_id}', 'ProductsController@edit');
Route::post('/editpro', 'ProductsController@update');
Route::delete('/delep/{product_id}', 'ProductsController@destroy');

//Add Shop
Route::get('/shop', 'ShopController@index');
//Route::get('/getid/{product_id}','ShopController@getProductId');
Route::get('/details/{product_id}', 'ShopController@details');
Route::post('/add_to_cart', 'ShopController@add_to_cart');
//Add Customer
Route::get('/customer', 'CustomerController@index');
Route::post('/addcust', 'CustomerController@store');
Route::get('/editc/{customer_id}', 'CustomerController@edit');
Route::post('/editcust', 'CustomerController@update');
Route::delete('/delec/{customer_id}', 'CustomerController@destroy');


Route::get('/catagories', 'CategoriesController@index');
Route::post('/store', 'CategoriesController@store');
Route::get('/categories/{cat_id}', 'CategoriesController@getCatagoryrById');
Route::post('/categories', 'CategoriesController@updateCategory');
Route::delete('/categories/{cat_id}', 'CategoriesController@deleteCategories');


Route::get('/product_variation', 'ProductsVariationController@index');
Route::post('/storproductsv', 'ProductsVariationController@store');
Route::get('/productsv/{variation_id}', 'ProductsVariationController@getProductvById');
Route::post('/productsv', 'ProductsVariationController@updateProductv');
Route::delete('/productsv/{variation_id}', 'ProductsVariationController@deleteProductv');

Route::get('/units', 'UnitsController@index');
Route::post('/storeunit', 'UnitsController@store');
Route::get('/units/{unit_id}', 'UnitsController@getUnitsById');
Route::post('/units', 'UnitsController@updateUnits');
Route::delete('/units/{unit_id}', 'UnitsController@deleteunits');

Route::get('employee-dashboard', 'UserController@dashboard');

Route::get('profile', 'UserController@profile');
Route::post('save_profile/{id}', 'UserController@save_profile');

Route::get('customer-profile', 'CustomerController@profile');
Route::post('save_customer_profile/{id}', 'CustomerController@save_profile');
//customer registration
Route::post('customer-register', 'CustomerController@customer_reg');
Route::get('checkout', 'ShopController@cart');
Route::post('insert-into-cart', 'ShopController@InsertIntoCart');

Route::post('check_customer_email', 'CustomerController@check_customer_email');
Route::post('check_user_email', 'UserController@check_user_email');
Route::post('save_order', 'OrderController@save_order');
Route::post('save_order_address', 'OrderController@save_order_address');
Route::post('save_order_payment', 'OrderController@save_payment');
Route::post('get-district-list', 'ShopController@get_district');

Route::get('my-order','ShopController@myOrder');
Route::get('return-order/{id}','ShopController@returnOrder');
Route::get('return-order-list','ShopController@returnOrderList');
//Invoice controller
Route::get('/listinvoice', 'InvoiceController@index');
Route::get('/invoicepreview/{order_id}', 'InvoiceController@previewinvoice');
Route::get('/invoiceprint/{id}', 'InvoiceController@printinvoice');
Route::post('update-quantity-in-cart', 'ShopController@updateQuantityInCart');
Route::get('order-history', 'CustomerController@order_history');

// Route::get('save_order', 'OrderController@save_order');

//employee-dashboard
Route::get('employee-order-list','UserController@orderList');
Route::get('process-order-list','UserController@orderProcessList');
Route::get('assign-to-sales-team/{id}','UserController@assignSalesTeam');
Route::post('assign-to-sales-team','UserController@saveAssignSalesData');
Route::get('sales-assign-data','UserController@getSalesAssignData');
Route::get('generate-po/{id}/{id1}','UserController@GeneratePOData');
Route::get('send-manufacturing-notification/{id}','UserController@sendNotification');
Route::get('manufacturing-order-list','UserController@getManufacturingOrder');
Route::get('change-order-status/{id}','UserController@changeOrderStatus');
Route::post('update-order-status','UserController@updateOrderStatus');
Route::get('generate-invoice/{id}/{id1}','UserController@GenerateInvoiceData');
//Razorpay payment
Route::post('razorpaypayment', 'ShopController@payment')->name('payment');
Route::get('notification_read/{id}','UserController@notificationRead');