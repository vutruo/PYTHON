<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;

// Route::resource('/', IssueController::class);


Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::get('/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/store', [IssueController::class, 'store'])->name('issues.store');
Route::get('/edit/{id}', [IssueController::class, 'edit'])->name('issues.edit');
Route::post('/update/{id}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/destroy/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
