<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    protected $fillable = ['name',
    'course_code',
    'credit_hours',];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
