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
//Employee Login Route
Route::get('employees-login', 'Auth\EmployeeController@showLoginForm');
Route::post('employees-login', 'Auth\EmployeeController@login')->name('employees-login');
//Customer Login Route
Route::get('/', 'Auth\CustomerLoginController@showLoginForm');
Route::post('customers-login', 'Auth\CustomerLoginController@login')->name('customers-login');


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
Route::get('/stock','StockController@index');
Route::post('/addstock','StockController@store');
Route::get('/edit/{stock_id}','StockController@edit');
Route::post('/editstock','StockController@update');
Route::delete('/dele/{stock_id}','StockController@destroy');

Route::get('/inven','InventoriesController@index');
Route::post('/addinven','InventoriesController@store');
Route::get('/editi/{inventory_id}','InventoriesController@edit');
Route::post('/editinven','InventoriesController@update');
Route::delete('/delei/{inventory_id}','InventoriesController@destroy');


Route::get('/pro','ProductsController@index');
Route::post('/addpro','ProductsController@store');
Route::get('/editp/{product_id}','ProductsController@edit');
Route::post('/editpro','ProductsController@update');
Route::delete('/delep/{product_id}','ProductsController@destroy');


Route::get('/cust','CustomerController@index');
Route::post('/addcust','CustomerController@store');
Route::get('/editc/{customer_id}','CustomerController@edit');
Route::post('/editcust','CustomerController@update');
Route::delete('/delec/{customer_id}','CustomerController@destroy');

Route::get('/shop','ShopController@index');
Route::get('/deatils/{product_id}','ShopController@getProductId');

Route::get('/index','CategoriesController@index');
Route::post('/store','CategoriesController@store');
Route::get('/categories/{cat_id}','CategoriesController@getCatagoryrById');
Route::post('/categories','CategoriesController@updateCategory');
Route::delete('/categories/{cat_id}','CategoriesController@deleteCategories');


Route::get('/index2','ProductsVariationController@index');
Route::post('/storproductsv','ProductsVariationController@store');
Route::get('/productsv/{variation_id}','ProductsVariationController@getProductvById');
Route::post('/productsv','ProductsVariationController@updateProductv');
Route::delete('/productsv/{variation_id}','ProductsVariationController@deleteProductv');

Route::get('/index3','UnitsController@index');
Route::post('/storeunit','UnitsController@store');
Route::get('/units/{unit_id}','UnitsController@getUnitsById');
Route::post('/units','UnitsController@updateUnits');
Route::delete('/units/{unit_id}','UnitsController@deleteunits');
