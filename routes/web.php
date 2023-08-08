<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

Route::get('/login', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard' );
Route::get('/logout','AdminController@logout');

Route::get('/add-category', 'CategoryController@add_category');
Route::get('/all-category', 'CategoryController@all');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');

Route::post('/create-category-product', 'CategoryController@create');
Route::post('/update-category-product/{cate_id}', 'CategoryController@update');

Route::get('/unactive_category/{cate_id}', 'CategoryController@unactive');
Route::get('/active_category/{cate_id}', 'CategoryController@active');
Route::get('/delete-category/{cate_id}', 'CategoryController@delete');