<?php

use App\Http\Controllers\AcessosController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashbordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session()->forget('user');
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('acesso.login');
// });

Route::post('/comentarios', [FeedbackController::class, 'redirecionarParaCriacao']);
Route::post('/comentarios/criarComentarios/', [FeedbackController::class, 'salvarFeedback']);

Route::get('/login', [AcessosController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AcessosController::class, 'login']);

Route::get('/dashboard', [AcessosController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard', [AcessosController::class,'dashboard'])->name('dashboard');

Route::get('/feedbacks', [DashbordController::class, 'fetchFeedbacks'])->name('feedbacks');

Route::get('/teste', [FeedbackController::class,'exibirDados']);
