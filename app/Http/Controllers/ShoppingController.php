<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ShoppingController extends Controller
{
    function Index()
    {
        $Items = Product::all();
        return view('home',['products' => $Items]);
    }

}
