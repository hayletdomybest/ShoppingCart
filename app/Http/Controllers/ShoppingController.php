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
        return view('shop.checkout.checkoutForm',['total'=> $total]);
    }

    function PayMentFinish(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_QeRErjuxzt3l0j6OEtZ4v4Fi00f3vFFPWv");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->input('stripeToken');
        $cart = session::get('Cart'.Auth::user()->id);

        $charge = \Stripe\Charge::create([
            'amount' => $cart->totalPrice,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        Session::pull('Cart'.Auth::user()->id, 'default');
        
        return redirect()->route('FinishCheckout',['Cart' => $cart]);
        
    }
    function FinishCheckout(Request $request)
    {
        //dd($request->input('Cart'));
        return view('shop.Checkout.PaymentFinish',['Cart' => $request->input('Cart')]);
    }
    function GetCheckout()
    {
        return View('checkoutTest');
    }

}
