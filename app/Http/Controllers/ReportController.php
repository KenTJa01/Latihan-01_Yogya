<?php

namespace App\Http\Controllers;

use App\Exports\ExportReport;
use App\Imports\ImportReport;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $yearFilter = $request->year_entrance;
        $studentFilter = $request->student_name;
        $subjectFilter = $request->subject_name;


        $query = DB::table('enrollments')
                ->join('subjects','enrollments.subject_id', '=' , 'subjects.subject_id')
                ->join('students','enrollments.student_id', '=' , 'students.student_id');

                if(!empty($yearFilter)){
                    $query->where('year_entrance','=' , $yearFilter);
                }
                if(!empty($studentFilter)){
                    $query->where('student_name','=' , $studentFilter);
                }
                if(!empty($subjectFilter)){
                    $query->where('subject_name','=' , $subjectFilter);
                }

        $reports = $query->get();

        $subjects = Subject::orderBy("subject_id", "asc")->get();
        $students = Student::orderBy("student_id", "asc")->get();

        $year = Student::select("year_entrance")->orderBy("year_entrance", "asc")->distinct()->get();
        $student = Student::select("student_name")->orderBy("student_name", "asc")->distinct()->get();
        $subject = Subject::select("subject_name")->orderBy("subject_name", "asc")->distinct()->get();


        return view("report", [
            "subjects" => $subjects,
            "students" => $students,
            "reports" => $reports,
            "yearDatas" => $year,
            "studentDatas" => $student,
            "subjectDatas" => $subject,
            "year" => $yearFilter,
            "student" => $studentFilter,
            "subject" => $subjectFilter
        ]);
    }

    public function filter(Request $request)
    {

        return $request->all();
    }

    public function import(Request $request)
    {
        Excel::import(new ImportReport, $request->file('file')->store('files'));
        return redirect()->back();
    }

    // FUNCTION EXPORT
    public function export(Request $request)
    {
        return Excel::download(new ExportReport(
            $request->year_entrance,
            $request->subject_name,
            $request->student_name,
        ), 'reports.xlsx');
    }
}
