<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ceklogin(Request $request)
    {
        if(!Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password]))
            {
                return redirect("/");
            }
                else
            {
                return redirect("/home");
            }
                       
    }

    public function ceklogout()
    {
        Auth::logout();
        return redirect("/");
    }
}
