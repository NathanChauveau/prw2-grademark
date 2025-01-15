<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class StudyPlan extends Model
{
    use ValidatingTrait;

    protected $rules = [
        'name' => 'required|min:2|max:255',
    ];

    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function coursesSync($ids)
    {
        $ids = collect($ids);
        $this->courses()->whereNotIn('id', $ids)->update(['study_plan_id' => null]);
        Course::whereIn('id', $ids)->update(['study_plan_id' => $this->id]);
    }
}
