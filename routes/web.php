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

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'Auth\LoginController@get_login');
Route::get('/sign-in', 'Auth\LoginController@get_login');
Route::post('/sign-in','Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::match(['post','get'],'/register', 'ManagementController@register');
Route::get('/register/signup', 'ManagementController@register');
Route::get('/register/registration-success', 'ManagementController@reg_success');
Route::match(['get','post'], '/register/verify-email', 'ManagementController@verify_email')->name('verify_email');

Route::match(['get','post'], '/clients/{id?}', 'CompanyController@clients');
Route::match(['get','post'], '/tasks/{id?}', 'CompanyController@tasks');
Route::match(['get','post'], '/jobs/{id?}', 'CompanyController@jobs');
Route::get('/dashboard', 'CompanyController@dashboard');




