<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //ruta para el controller Student
    Route::resource('students', StudentController::class);
    Route::resource('professors', ProfessorController::class);
});


