<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $flagActive = 1;
        $flagNonActive = 0;

        $usersFilter = User::where("flag_active", $flagActive)->orWhere("flag_active", $flagNonActive)->orderby("user_id", "asc")->get();

        return view('user', [
            'users' => $usersFilter,
        ]);
    }

    public function store(Request $request)
    {
        $find = User::find($request->user_id);

        if ($find){

            return redirect("/user")->with("error", "ID has been used! Try another ID!");

        } else {
            $validatedData = $request->validate([
                "user_id" => "required|min:4",
                "name" => "required",
                "password" => "required|min:5|max:255",
                "flag_active"
            ]);

            $validatedData["password"] = bcrypt($validatedData["password"]);
            if ( $request->flag_Active != 1 )
            {
                $flagNonActive = 0;
                $validatedData["flag_active"] = $flagNonActive;

            } else {
                $flagActive = 1;
                $validatedData["flag_active"] = $flagActive;
            }

            User::create($validatedData);

            return redirect("/user")->with("success", "Registration successfull!! Please Login");
        }
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

            return redirect('/user')->with('success-edit', "Subject's Data has been updated!");
        }
    }

    public function delete(Request $request)
    {
        $deletedData = User::find($request->user_id);

        if ($deletedData != null)
        {
            $deletedData->flag_active = "2";

            $deletedData->update();

            return redirect("/user")->with("success-delete", "User's Data has been deleted!");
        }
    }

}
