<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shopping\Cart;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
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

    function GetSaleUpload()
    {
        return view('shop.sale.sale');
    }

    function PostSaleUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|min:1|max:50',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return  back()->withErrors($validator)
                          ->withInput();
        }
        Session::forget('errors');

        $id = Product::max('id') + 1;

        $id = str_pad($id,strlen($id) + 1,'0',STR_PAD_LEFT);

        $imageName = $id .'.jpg';
        if(file_exists('./picture/'. $imageName))
            return back()->withErrors('檔案撞名');
        request()->image->move(public_path('picture'), $imageName);

        $product  = new Product();
        $product->imagePath =  './picture/'.$imageName;
        $product->title = request()->input('title');
        $product->price = request()->input('price');
        $product->description  = request()->input('description');
        $product->save();

        return redirect()->route('shop.index');

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
