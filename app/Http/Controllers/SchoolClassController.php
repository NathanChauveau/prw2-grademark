<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\StudyPlan;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('school_classes.index', ['school_classes' => SchoolClass::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_classes.create', ['school_class' => new SchoolClass(), 'study_plans' => StudyPlan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $school_class = new SchoolClass($request->all());

        $school_class->saveOrFail();

        return redirect(route("school_classes.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        return view('school_classes.show', ['school_class' => $schoolClass]);
    }
}
