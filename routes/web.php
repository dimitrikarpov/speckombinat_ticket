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
Route::get('/theme', function () {
    return view('layouts.admin');
});

Route::get('/', 'TicketController@create');
Route::get('tickets', 'TicketController@index')->name('tickets');
Route::post('redirector', 'TicketController@redirector');
Route::get('ticket/add', 'TicketController@add');
Route::get('ticket/{ticket}', 'TicketController@show');
Route::post('ticket/store', 'TicketController@store');
Route::get('ticket/{ticket}/edit', 'TicketController@edit');
Route::post('ticket/{ticket}/update', 'TicketController@update');

Route::get('category', 'CategoryController@index');
Route::get('category/{category}/edit', 'CategoryController@edit');
Route::post('category/{category}/update', 'CategoryController@update');
Route::get('category/create', 'CategoryController@create');
Route::post('category/store', 'CategoryController@store');
Route::get('category/{category}/destroy', 'CategoryController@destroy');

Route::get('user', 'UserController@index');
Route::get('user/{user}/edit', 'UserController@edit');
Route::post('user/{user}/update', 'UserController@update');
Route::get('user/create', 'UserController@create');
Route::post('user/store', 'UserController@store');
Route::get('user/{user}/destroy', 'UserController@destroy');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('home/{tab}', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');
