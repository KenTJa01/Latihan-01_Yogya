<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view("profile");
    }

    public function edit(Request $request)
    {
        // return $request->all();
        $updateData = User::find($request->user_id);


        $updateData->user_id = $request->user_id;
        $updateData->name = $request->name;
        $updateData->password = $request->password;
        $updateData->birth_date = $request->birth_date;
        $updateData->address = $request->address;
        $updateData->email = $request->email;
        $updateData->religion = $request->religion;
        $updateData->flag_active = $request->flag_active;

        if ($request->file("image"))
        {
            $updateData->image = $request->file("image")->store("image");
        }

        $updateData->update();

        return redirect('/profile')->with('success', "Subject's Data has been updated!");

    }
}
