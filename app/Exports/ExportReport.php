<?php

namespace App\Exports;

use App\Models\enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ExportReport implements FromCollection, WithMapping, WithHeadings
{
    protected $year_entrance;
    protected $subject_name;
    protected $student_name;

    function __construct($year_entrance, $subject_name, $student_name)
    {
        $this->year_entrance = $year_entrance;
        $this->subject_name = $subject_name;
        $this->student_name = $student_name;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $query = DB::table('enrollments')
                ->join('subjects','enrollments.subject_id', '=' , 'subjects.subject_id')
                ->join('students','enrollments.student_id', '=' , 'students.student_id');

                if(!empty($this->year_entrance)){
                    $query->where('year_entrance','=' , $this->year_entrance);
                }
                if(!empty($this->student_name)){
                    $query->where('student_name','=' , $this->student_name);
                }
                if(!empty($this->subject_name)){
                    $query->where('subject_name','=' , $this->subject_name);
                }

        $reports = $query->get();

        return $reports;
    }

    public function map($reports): array
    {
        return [
            $reports->subject_id,
            $reports->subject_name,
            $reports->student_id,
            $reports->student_name,
            $reports->year_entrance,
            $reports->grade,
            $reports->status
        ];
    }

    public function headings(): array {
        return [
            "Subject ID",
            "Subject Name",
            "Student ID",
            "Student Name",
            "Year",
            "Grade",
            "Status"
        ];
    }
}
