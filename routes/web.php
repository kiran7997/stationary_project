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
Route::get('employee-dashboard', 'UserController@dashboard');
