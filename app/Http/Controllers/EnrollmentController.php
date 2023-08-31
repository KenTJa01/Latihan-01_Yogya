<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $flag = 1;
        $subjects = Subject::where("flag_active", $flag)->orderby("subject_id", "asc")->get();
        $students = Student::where("flag_active", $flag)->orderby("student_id", "asc")->get();
        $enrollments = Enrollment::orderBy("id", "asc")->get();
        $subjectData = [];

        return view("enrollment", [
            "subjects" => $subjects,
            "students" => $students,
            "enrollments" => $enrollments
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

        $startDateFilter = $request->enroll_start_date;
        $endDateFilter = $request->enroll_end_date;

        $validateData = $request->validate([
            "subject_id" => "required",
            "student_id" => "required",
            "enroll_start_date" => "required",
            "enroll_end_date" => "required",
            "status" => "required",
            "grade" => "required"
        ]);

        $validateData["user_id"] = auth()->user()->user_id;

        Enrollment::create($validateData);

        return redirect("/enrollment")->with("success", "New Enrollment has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
