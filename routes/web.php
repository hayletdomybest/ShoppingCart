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
Route::get('/',function (){
    return redirect()->route('shop.index');
});
Route::group(['prefix'=>'shopping'],function(){
    Route::get('/',[
        'uses' => 'ShoppingController@Index',
        'as' => 'shop.index'
    ]);
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/cart',[
            'uses' => 'ShoppingController@Cart',
            'as' => 'shop.cart',
        ]);
        Route::get('/saleUpload',[
            'uses' => 'ShoppingController@GetSaleUpload',
            'as' => 'shop.sale.upload',
        ]);
        Route::post('/uploadSubmit',[
            'uses' => 'ShoppingController@PostSaleUpload',
            'as' => 'shop.Upload.submit',
        ]);
        Route::get('/add-to-cart/{id}',[
            'uses' => 'ShoppingController@AddToCart',
            'as' => 'shop.add',
        ]);
        Route::get('/checkout/{total}',[
            'uses' => 'ShoppingController@GetToCheckout',
            'as' => 'shop.checkoutForm'
        ]);
        Route::post('/paymentFinish',[
            'uses' => 'ShoppingController@PayMentFinish',
            'as' => 'shop.paymentFinish'
        ]);
        Route::get('/paymentFinish/FinishCheckout',[
            'uses' => 'ShoppingController@FinishCheckout',
            'as' => 'shop.finishCheckout'
        ]);
    });

});

Route::get('Testcheckout',[
    'uses' => 'ShoppingController@GetToCheckout',
    'as' => 'checkout'
]);
Route::Post('Testcheckout',[
    'uses' => 'ShoppingController@PostCheckout',
    'as' => 'checkout'
]);


Route::group(['prefix' => 'user'],function(){
    Route::get('/login',function(){
        return view('user.login');
    })->name('user.login');
    Route::get('/logout',[
        'uses' => 'UserController@UserLogout',
        'as' => 'user.logout'  
    ]);
    Route::get('/signup',function(){
        return view('user.signup');  
    })->name('user.signup');
    Route::post('/login',[
        'uses' => 'UserController@UserLogin',
        'as' => 'user.login'
    ]);
    Route::post('/signup',[
        'uses' => 'UserController@UserSignup',
        'as' => 'user.signup'
    ]);
});

