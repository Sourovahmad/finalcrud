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

Route::get('/', 'FinalcrudController@index')->name("home");
Route::get('create', 'FinalcrudController@create')->name("create");
Route::post('create', 'FinalcrudController@store')->name("store");
Route::get('edit/{id}' ,'FinalcrudController@edit')->name("edit");
Route::post('update/{id}' ,'FinalcrudController@update')->name("update");
Route::delete('destroy/{id}' ,'FinalcrudController@destroy')->name("destroy");



//  product

Route::get('/product', 'ProductController@index')->name("home");
Route::get('create', 'ProductController@create')->name("create");
Route::post('create', 'ProductController@store')->name("store");
Route::get('edit/{id}' ,'ProductController@edit')->name("edit");
Route::post('product/update/{id}' ,'ProductController@update')->name("update");
Route::delete('destroy/{id}' ,'ProductController@destroy')->name("destroy");



?>