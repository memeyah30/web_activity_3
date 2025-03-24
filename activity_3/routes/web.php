<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('login');

Route::middleware([AuthCheck::class])->group(function () {
    // View
    Route::get('/students', [StudentsController::class, 'myView'])->name('std.myView');
    // Create
    Route::post('/add-new', [StudentsController::class, 'addNewStudent'])->name('std.addNewStudent');
    // PUT
    Route::get('/student/update/{id}', [StudentsController::class, 'updateView'])->name('std.updateView');
    Route::post('/update', [StudentsController::class, 'updateME'])->name('std.studentUpdate');
    // DELETE
    Route::get('/delete', [StudentsController::class, 'deleteME'])->name('std.studentDelete');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
