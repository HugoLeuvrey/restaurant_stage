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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/restaurant/create', 'AddrestaurantController@create');
Route::get('/restaurant/{restaurant}', 'AddrestaurantController@show');


Route::patch('/home', 'AddrestaurantController@store');
Route::delete('/restaurant/delete/{restaurant}', 'AddrestaurantController@destroy');


Route::get('/category/index/{category}', 'CategoryController@index');
Route::get('/category/create/{restaurant}', 'CategoryController@create');
Route::patch('/category/create/{restaurant}', 'CategoryController@store');
Route::delete('/category/delete/{category}', 'CategoryController@destroy');



Route::get('/dish/index/{restaurant}', 'DishController@index');
Route::get('/dish/create/{restaurant}', 'DishController@create');
Route::patch('/dish/create/{restaurant}', 'DishController@store');
Route::delete('/dish/delete/{dish}', 'DishController@destroy');


