<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Middleware\CheckTypeOfUser;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', CheckTypeOfUser::class . ':App\Models\Student'])->group(function () {
        Route::get('/courses/{course}/grades', [GradeController::class, 'courseIndex'])->name('courses.grades.index');
        Route::resource('grades', GradeController::class);
    });
    Route::middleware(['auth', CheckTypeOfUser::class . ':App\Models\Manager'])->group(function () {
        Route::resource('students', StudentController::class)->only('index', 'show');
        Route::resource('study_plans', StudyPlanController::class)->except('edit', 'destroy');
    });
});

require __DIR__ . '/auth.php';
