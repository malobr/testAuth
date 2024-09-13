<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Rotas de registro e login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rotas protegidas por autenticação CSRF
Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout']);
    
    // CRUD de testes (TestController)
    Route::get('tests', [TestController::class, 'index']);        // Listar todos os testes e seus usuários
    Route::get('tests1', [TestController::class, 'index1']);      // Listar todos os testes apenas
    Route::get('tests/{id}', [TestController::class, 'show']);    // Exibir um teste específico
    Route::post('tests', [TestController::class, 'store']);       // Criar um novo teste
    Route::put('tests/{id}', [TestController::class, 'update']);  // Atualizar um teste
    Route::delete('tests/{id}', [TestController::class, 'destroy']); // Deletar um teste
    
    // CRUD de usuários (AuthController)
    Route::get('users', [AuthController::class, 'index']);        // Listar todos os usuários e seus testes
    Route::get('users1', [AuthController::class, 'index1']);      // Listar todos os usuários apenas
    Route::get('users/{id}', [AuthController::class, 'show']);    // Exibir um usuário específico
    Route::put('users/{id}', [AuthController::class, 'update']);  // Atualizar um usuário
    Route::delete('users/{id}', [AuthController::class, 'destroy']); // Deletar um usuário

    // CRUD de clientes (ClientController)
    Route::get('clients', [ClientController::class, 'index']);        // Listar todos os clientes
    Route::get('clients/{id}', [ClientController::class, 'show']);    // Exibir um cliente específico
    Route::post('clients', [ClientController::class, 'store']);       // Criar um novo cliente
    Route::put('clients/{id}', [ClientController::class, 'update']);  // Atualizar um cliente
    Route::delete('clients/{id}', [ClientController::class, 'destroy']); // Deletar um cliente
});
//Route::post('clients', [ClientController::class, 'store']);       // Criar um novo cliente
