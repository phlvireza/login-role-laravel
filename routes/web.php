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



Route::group(['middleware'=>['auth']],function(){

    Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
        Route::group(['as'=>'admin.'],function(){
            Route::get('home', 'HomeController@homeAdmin')->name('home'); //route admin.home
        });
    });
    
    Route::group(['prefix'=>'user','middleware'=>['user']],function(){
        Route::group(['as'=>'user.'],function(){
            Route::get('home', 'HomeController@homeUser')->name('home'); //route user.home
        });
    });

});
