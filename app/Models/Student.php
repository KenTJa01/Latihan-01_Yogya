<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = "student_id";
    public $incrementing = false;

    protected $fillable = [
        "student_id",
        "student_name",
        "date_of_birth",
        "year_entrance",
        "flag_active"
    ];

    protected $table = "students";

    public function enrollment(){
        return $this->hasMany(Enrollment::class, "student_id");
    }

}
