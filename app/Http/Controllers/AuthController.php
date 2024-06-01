<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost (Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // return redirect()->route('login')->with('success', 'Registration Successful! Please Login to Continue...');
        return back()->with('success', 'Register has beeen created sucessfully!');
    }
    public function login ()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $credetails = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($credetails))
        {
            return redirect('/home')->with('success', 'Login succesfully');
        }
        return back()->with('error', 'Email or Password is wrong!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
