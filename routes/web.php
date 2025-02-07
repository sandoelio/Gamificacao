<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('form.entrar');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
