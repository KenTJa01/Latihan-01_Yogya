<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index()
    {
        return view("signin.index", [
            "title" => "Signin"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->with("loginError", "Login Failed!");

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/signin");
    }

}
