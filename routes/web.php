<?php

use App\Http\Controllers\AcessosController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('acesso.login');
});

Route::post('/comentarios', [FeedbackController::class, 'redirecionarParaCriacao']);
Route::post('/comentarios/criarComentarios/', [FeedbackController::class, 'salvarFeedback']);
Route::post('/login', [AcessosController::class, 'login']);


Route::get('/teste', [FeedbackController::class,'exibirDados']);
