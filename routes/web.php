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
Route::get('customers-logout', 'Auth\CustomerLoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('departments', 'DepartmentController');
    Route::post('get-district', 'UserController@get_district');
    Route::post('check_username', 'UserController@check_username');
});
//customer routes
Route::get('customer-dashboard', 'CustomerController@dashboard');



//Add Stocks //
Route::get('/stock', 'StockController@index');
Route::post('/addstock', 'StockController@store');
Route::get('/edit/{stock_id}', 'StockController@edit');
Route::post('/editstock', 'StockController@update');
Route::delete('/dele/{stock_id}', 'StockController@destroy');

//Add Inventories

Route::get('/inventories', 'InventoriesController@index');
Route::post('/addinven', 'InventoriesController@store');
Route::get('/editi/{inventory_id}', 'InventoriesController@edit');
Route::post('/editinven', 'InventoriesController@update');
Route::delete('/delei/{inventory_id}', 'InventoriesController@destroy');

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
Route::get('/details', 'ShopController@details');
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