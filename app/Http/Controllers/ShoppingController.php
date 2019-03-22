<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shopping\Cart;
use Auth;
use Session;
class ShoppingController extends Controller
{
    function Index()
    {
        $Items = Product::all();
        return view('home',['products' => $Items]);
    }

    function Cart()
    {
        $cart = session::get('Cart'.Auth::user()->id);
        if($cart){
            $items = $cart->items;
            
            return view('shop.cart',['items'=>$items , 
                                     'totalPrice'=> $cart->totalPrice
                    ]);
        }
        return view('shop.cart');

    }

    function AddToCart(Request $request,$id)
    {
        $UserId = 'Cart'.Auth::user()->id;
        $cart = Session::get($UserId);

        if(!$cart)
            $cart = new Cart();
        $product = Product::find($id);
        $cart->addToCart($product,$id);

        Session::put($UserId,$cart);

        return redirect()->back();

      
    }

    function GetToCheckout($total)
    {
        return view('shop.checkoutForm',['total'=> $total]);
    }

}
