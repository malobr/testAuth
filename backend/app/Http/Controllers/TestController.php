<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use App\Models\Client;
use Validator;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    // Listar todos os testes
    public function index()
    {
        return response()->json(Test::with('user', 'client')->get(), 200);
    }
    
    // Listar todos os testes sem usuários e clientes
    public function index1()
    {
        return response()->json(Test::all(), 200);
    }

    // Exibir um teste específico
    public function show($id)
    {
        $test = Test::with(['user', 'client'])->findOrFail($id);
        return response()->json($test, 200);
    }

    // Criar um novo teste
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'test_name' => 'required|string|max:255',
            'test_results' => 'required|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $test = Test::create([
            'user_id' => $request->user_id,
            'test_name' => $request->test_name,
            'test_results' => $request->test_results,
            'client_id' => $request->client_id,
        ]);

        return response()->json($test, 201);
    }

    // Atualizar um teste existente
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'test_name' => 'required|string|max:255',
            'test_results' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $test->update($request->all());
        return response()->json($test, 200);
    }

    // Excluir um teste
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return response()->json(['message' => 'Test deleted successfully'], 200);
    }
}
