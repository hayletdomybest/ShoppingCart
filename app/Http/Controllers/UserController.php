<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    function UserLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect()->route('shop.index');
        
        return redirect()->back()->withErrors(['login'=>'信箱&密碼輸入錯誤']);;
        
    }

    function UserLogout()
    {
        Auth::logout();
        return redirect()->route('shop.index');
    }

    function UserSignup(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect()->route('shop.index');
        return redirect()->route('user.login');
    }
}
