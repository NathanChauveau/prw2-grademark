<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    //


    public function studyPlan()
    {
        return $this->hasOne(StudyPlan::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
