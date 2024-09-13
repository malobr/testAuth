<?php


namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Listar todos os clientes
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    // Criar um novo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|string|email|max:255',
        ]);
    
        $client = Client::create($validated);
    
        return response()->json($client, 201);
    }
    

    // Mostrar um cliente específico
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    // Atualizar um cliente
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|string|email|max:255',
        ]);

        $client->update($validated);

        return response()->json($client);
    }

    // Deletar um cliente
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully']);
    }
}
