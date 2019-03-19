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
    return view('home');
});

Route::get('/login',function(){
    return view('user.login');
})->name('user.login');
Route::get('/logout',[
    'uses' => 'UserController@UserLogout',
    'as' => 'user.logout'  
]);
Route::post('/login',[
    'uses' => 'UserController@UserLogin',
    'as' => 'user.login'
]);
