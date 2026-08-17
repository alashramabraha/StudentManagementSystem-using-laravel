<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\StudentProfile;
use App\Models\Course;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'department',
        'address',
        'phone_number',
        'date_of_birth',
        'gender',
        'gpa',
        'is_active',
    ];

    //One-to-Many Relationship
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    //One-to-One Relationship
    public function profile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    //Many-to-Many Relationship
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
