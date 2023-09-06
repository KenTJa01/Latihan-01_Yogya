<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // $user = User::find($request->name);

        $user = User::select("flag_active")->where("name", $request->name)->value("flag_active");

        // return $user;

        if ($user == 0 || $user == 2)
        {
            return back()->with("loginError", "Login Failed!");
        }

        elseif ($user == 1)
        {

            if (Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended("/");
            }

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
