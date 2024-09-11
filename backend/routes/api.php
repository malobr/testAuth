<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Rotas de registro e login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout']);
    
    // CRUD de testes (TestController)
    Route::get('tests', [TestController::class, 'index']);        // Listar todos os testes e seus usuarios
    Route::get('tests1', [TestController::class, 'index1']);        // Listar todos os testes apenas...
    Route::get('tests/{id}', [TestController::class, 'show']);    // Exibir um teste específico
    Route::post('tests', [TestController::class, 'store']);       // Criar um novo teste
    Route::put('tests/{id}', [TestController::class, 'update']);  // Atualizar um teste
    Route::delete('tests/{id}', [TestController::class, 'destroy']); // Deletar um teste

    // CRUD de usuários (AuthController)
    Route::get('users', [AuthController::class, 'index']);        // Listar todos os usuários e seus testes
    Route::get('users1', [AuthController::class, 'index1']);        // Listar todos os usuários apenas
    Route::get('users/{id}', [AuthController::class, 'show']);    // Exibir um usuário específico
    Route::put('users/{id}', [AuthController::class, 'update']);  // Atualizar um usuário
    Route::delete('users/{id}', [AuthController::class, 'destroy']); // Deletar um usuário
});
Route::get('users', [AuthController::class, 'index']);        // Listar todos os usuários
