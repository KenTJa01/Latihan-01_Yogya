<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flag = 1;
        $studentsFilter = Student::where("flag_active", $flag)->orderby("student_id", "asc")->get();

        return view('student', [
            'students' => $studentsFilter
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
        $find = Student::find($request->student_id);

        if ($find){

            return redirect("/student")->with("error", "ID has been used! Try another ID!");

        } else {

            $validateData = $request->validate([
                "student_id" => "required|min:5",
                "student_name" => "required|max:255",
                "date_of_birth" => "required",
                "year_entrance" => "required"
            ]);

            $validateData["user_id"] = auth()->user()->user_id;

            Student::create($validateData);

            return redirect("/student")->with("success", "New Student has been added!");


        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateData = Student::find($request->student_id);

        if ($updateData != null)
        {
            $updateData->student_name = $request->student_name;
            $updateData->date_of_birth = $request->date_of_birth;
            $updateData->year_entrance = $request->year_entrance;

            $updateData->update();

            return redirect("/student")->with("success-edit", "Student's Data has been updated!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {

        $deletedData = Student::find($request->student_id);

        if ($deletedData != null)
        {
            $deletedData->flag_active = "2";

            $deletedData->update();

            return redirect("/student")->with("success-delete", "Student's Data has been deleted!");
        }
    }
}
