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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');;

Auth::routes(['register' => false]);
Route::get('addUser', 'SettingsController@addUser')->name('addUser');
Route::post('registerUser','SettingsController@registerUser')->name('registerUser');

Route::get('/home', 'HomeController@index')->name('home');


//users Routes
//Route::get('users','UsersController@index')->name('users.index');

Route::middleware('can:users-manger')->group(function (){
    Route::resource('users','UsersController')->except([
        'show'
    ]);;
});