<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flag = 1;
        $subjectsFilter = Subject::where("flag_active", $flag)->orderby("subject_id", "asc")->get();

        return view('subject', [
            'subjects' => $subjectsFilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "subject_id" => "required|min:4",
            "subject_name" => "required|max:255",
            "credit" => "required",
            "subject_pre_required" => "max:255"
        ]);

        $validateData["user_id"] = auth()->user()->user_id;

        Subject::create($validateData);

        return redirect("/subject")->with("success", "New Subject has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateData = Subject::find($request->subject_id);

        if ($updateData != null)
        {
            $updateData->subject_name = $request->subject_name;
            $updateData->credit = $request->credit;
            $updateData->subject_pre_required = $request->subject_pre_required;

            $updateData->update();

            return redirect('/subject')->with('success-edit', "Subject's Data has been updated!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $deletedData = Subject::find($request->subject_id);

        if ($deletedData != null)
        {
            $deletedData->flag_active = "2";

            $deletedData->update();

            return redirect("/subject")->with("success", "Subject's Data has been deleted!");
        }
    }
}
