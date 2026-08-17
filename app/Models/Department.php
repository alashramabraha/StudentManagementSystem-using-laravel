<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Department extends Model
{
   protected $fillable = ['name',];

   //One-to-Many Relationship
   public function students()
   {
      return $this->hasMany(Student::class);
   }
}
