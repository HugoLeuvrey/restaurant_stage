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

Route::get('/home', 'HomeController@index')->name('home') ->middleware('App\Http\Middleware\Authenticate');

Route::get('/restaurant/create', 'AddrestaurantController@create') ->middleware('App\Http\Middleware\Authenticate');
Route::get('/restaurant/{restaurant}', 'AddrestaurantController@show') ->middleware('App\Http\Middleware\Authenticate');


Route::patch('/home', 'AddrestaurantController@store') ->middleware('App\Http\Middleware\Authenticate');
Route::delete('/restaurant/delete/{restaurant}', 'AddrestaurantController@destroy') ->middleware('App\Http\Middleware\Authenticate');


Route::get('/category/index/{category}', 'CategoryController@index') ->middleware('App\Http\Middleware\Authenticate');
Route::get('/category/create/{restaurant}', 'CategoryController@create') ->middleware('App\Http\Middleware\Authenticate');
Route::patch('/category/create/{restaurant}', 'CategoryController@store') ->middleware('App\Http\Middleware\Authenticate');
Route::delete('/category/delete/{category}', 'CategoryController@destroy') ->middleware('App\Http\Middleware\Authenticate');



Route::get('/dish/index/{restaurant}', 'DishController@index') ->middleware('App\Http\Middleware\Authenticate');
Route::get('/dish/create/{restaurant}', 'DishController@create') ->middleware('App\Http\Middleware\Authenticate');
Route::patch('/dish/create/{restaurant}', 'DishController@store') ->middleware('App\Http\Middleware\Authenticate');
Route::delete('/dish/delete/{dish}', 'DishController@destroy') ->middleware('App\Http\Middleware\Authenticate');


