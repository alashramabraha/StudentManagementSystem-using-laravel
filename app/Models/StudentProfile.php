<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class StudentProfile extends Model
{
    protected $fillable = ['student_id',
    'address',
    'phone_number',
    'bio',];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
