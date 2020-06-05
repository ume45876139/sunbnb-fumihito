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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::prefix('sunbnb')->group(function (){
    Route::get('/', function () {
    return view('sunbnb/welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
});
