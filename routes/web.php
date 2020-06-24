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
//search
Route::get('search','SearchController@search')->name('search');
//iamge controller
Route::get('uploader', 'ImageController@index');
Route::post('upload', 'ImageController@upload')->name('upload');

Route::prefix('sunbnb')->group(function (){
    Route::get('/', function () {
        return view('sunbnb/welcome');
        });

    Route::prefix('user')->group(function (){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/managelisting', 'User\ListingController@manageListing')->name('managelisting');
        Route::get('/reservation', 'User\ReservationController@reservation')->name('reservation');
        Route::get('/trip', 'User\TripController@trip')->name('trip');
        Route::get('/editprofile', 'User\ProfileController@editProfile');
        Route::post('/{reservation}/reviewhost', 'User\ReviewController@reviewtohost')->name('reviewtohost');
        Route::post('{trip}/reviewtoguest', 'User\ReviewController@reviewtoguest')->name('reviewtoguest');

        //related search, reservation
        Route::get('/search','SearchController@userSearch')->name('usersearch');
        Route::get('/{listing}/reserve','User\ReservationController@reserve')->name('reserve');
        Route::get('{listing}/calculate','User\ReservationController@calculate')->name('calculate');
        Route::post('{listing}/storereservation', 'User\ReservationController@storeReservation')->name('storereservation');

        //update function
        Route::post('/updateprofile', 'User\ProfileController@storeProfile')->name('updateprofile');
    });

    Route::prefix('listing')->group(function (){
        Route::get('createroom', 'Host\ListingController@createRoom');
        Route::get('/{listing}/listing', 'Host\ListingController@listing')->name('listing');
        Route::get('/{listing}/pricing', 'Host\ListingController@pricing')->name('pricing');
        Route::get('/{listing}/description', 'Host\ListingController@description')->name('description');
        Route::get('/{listing}/photo', 'Host\ListingController@photo')->name('photo');
        Route::get('/{listing}/amenities', 'Host\ListingController@amenities')->name('amenities');
        Route::get('/{listing}/location', 'Host\ListingController@location')->name('location');

        //store functions
        Route::post('storeroom', 'Host\ListingController@storeRoom');
        Route::post('/{listing}/updateroom', 'Host\ListingController@updateRoom');
        Route::post('/{listing}/storeprice', 'Host\ListingController@storePrice');
        Route::post('/{listing}/storedescription', 'Host\ListingController@storeDescription');
        Route::post('/{listing}/storephoto', 'Host\ListingController@storePhoto');
        Route::post('/{listing}/storeamenities', 'Host\ListingController@storeAmenities');
        Route::post('/{listing}/storelocation', 'Host\ListingController@storeLocation');
        Route::post('/{listing}/publish', 'Host\ListingController@publish');
        Route::post('/{listing}/upload', 'ImageController@upload')->name('upload');
    });
});
