<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    //
    protected $fillable = ['name', 'study_plan_id'];


    public function studyPlan()
    {
        return $this->hasOne(StudyPlan::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
