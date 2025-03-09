<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;



    Route::get('/', function () {
        return view('home');
    });
    // Students Routes
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');  
    Route::get('/students/search', [StudentsController::class, 'search'])->name('students.search');  

    
    // Student Edit Routes
    Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');  
    Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update'); 

    // Student Delete Routes
    Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy'); 

    // Add new student (protected)
    Route::post('/add-new', [StudentsController::class, 'addNewStudent'])->name('std.addNewStudent'); 
    
    Route::get('/', [StudentsController::class, 'myView'])->name('std.myView'); 



