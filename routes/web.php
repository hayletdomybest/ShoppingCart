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
Route::group(['prefix'=>'shopping'],function(){
    Route::get('/',[
        'uses' => 'ShoppingController@Index',
        'as' => 'index'
    ]);
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/cart',[
            'uses' => 'ShoppingController@Cart',
            'as' => 'cart',
        ]);
        Route::get('/add-to-cart/{id}',[
            'uses' => 'ShoppingController@AddToCart',
            'as' => 'add',      
        ]);
        Route::get('/checkout/{total}',[
            'uses' => 'ShoppingController@GetToCheckout',
            'as' => 'checkoutForm'
        ]);
    });

});


Route::group(['prefix' => 'user'],function(){
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
});

