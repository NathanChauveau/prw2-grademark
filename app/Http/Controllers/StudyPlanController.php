<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use App\Models\Course;
use Illuminate\Http\Request;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('study_plans.index', ['studyPlans' => StudyPlan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study_plans.create', ['studyPlan' => new StudyPlan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studyPlan = new StudyPlan($request->all());
        $studyPlan->saveOrFail();

        return redirect(route('study_plans.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyPlan $studyPlan)
    {
        $availableCourses = Course::available()->get();
        return view('study_plans.show', compact('studyPlan', 'availableCourses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyPlan $studyPlan)
    {
        if ($request->name) {
            $studyPlan->courses()->create($request->all());
        } else {
            $studyPlan->coursesSync($request->courses);
        }
        return redirect(route('study_plans.show', $studyPlan));
    }
}
