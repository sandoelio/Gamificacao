<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GameController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('form.entrar');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/game', [GameController::class, 'index'])->name('game.index');
Route::post('/game/answer', [GameController::class, 'submitAnswer'])->name('game.submitAnswer');
Route::get('/game-over', [GameController::class, 'gameOver'])->name('game.over');
Route::get('/dashboard', [GameController::class, 'dashboard'])->name('game.dashboard');
Route::get('/game/timeup', [GameController::class, 'timeUp'])->name('game.timeup');

Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {

    Route::get('/painel', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/ranking-data', [DashboardController::class, 'getRankingData'])->name('admin.ranking');
    Route::get('/user-stats', [DashboardController::class, 'getUserStats'])->name('admin.user');

    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::get('/questionCadastradas', [QuestionController::class, 'perguntasCadastradas'])->name('questions.cadastradas');


    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
});

