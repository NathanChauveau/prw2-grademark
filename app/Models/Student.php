<?php

namespace App\Models;

class Student extends User
{
    protected $table = 'users';

    public function grades()
    {
        return $this->hasMany(Grade::class, 'user_id');
    }

    public function graded_courses()
    {
        return $this->hasManyThrough(Course::class, Grade::class, 'user_id', 'id', 'id', 'course_id')->distinct();
    }


    public function filter()
    {
        //WIP
        $collection = collect([]);
        foreach ($this as $student) {
            $collection->push($student->grades->mean());
        }


        return $collection->sortByDesc('1')->take(10);
    }

    public function schoolClass()
    {
        return $this->belongsTo(related: SchoolClass::class);
    }
}
