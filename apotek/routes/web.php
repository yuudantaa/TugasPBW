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
Route::group(['middleware'=>['guest']], function(){

Route::get('/', "PageController@login")->name('login');
Route::post('/login', "AuthController@ceklogin");

});

Route::group(['middleware'=>['auth']], function(){
    Route::post("/updateuser","PageController@updateuser");
    Route::get("/logout","AuthController@ceklogout");
    Route::get('/user', "PageController@edituser");

    Route ::get("/home","PageController@home");
    Route ::get("/obat","PageController@obat");
    Route::get("/about-us","PageController@aboutus");
    Route::get('/obat/tambahobat', "PageController@tambahobat");
    Route::post('/save', "PageController@simpanobat");
    Route::get('/obat/editobat/{id}', "PageController@editobat");
    Route::put("/update/{id}","PageController@updateobat");
    Route::get("/delete/{id}","PageController@deleteobat");

});