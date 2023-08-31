<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $flag = 1;

        $usersFilter = User::where("flag_active", $flag)->orderby("user_id", "asc")->get();

        return view('user', [
            'users' => $usersFilter,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "user_id" => "required|min:4",
            "name" => "required",
            "password" => "required|min:5|max:255",
            "flag_active"
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);
        $validatedData["flag_active"] = $request->flag_active;

        User::create($validatedData);

        return redirect("/user")->with("success", "Registration successfull!! Please Login");

    }

    public function update(Request $request)
    {
        $updateData = User::find($request->user_id);

        if ($updateData != null)
        {
            $updateData->name = $request->name;
            $updateData->email = $request->email;
            $updateData->flag_active = $request->flag_active;

            $updateData->update();

            return redirect('/user')->with('success', "Subject's Data has been updated!");
        }
    }

}
