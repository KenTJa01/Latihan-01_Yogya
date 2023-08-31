<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view("signup.index", [
            "title" => "Signup"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "user_id" => "required|min:4",
            "name" => "required",
            "password" => "required|min:5|max:255"
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);

        User::create($validatedData);

        return redirect("/signin")->with("success", "Registration successfull!! Please Login");

    }
}
