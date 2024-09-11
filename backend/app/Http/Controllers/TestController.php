<?php

// app/Http/Controllers/TestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Validator;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return Test::with('user')->get();
    }

    public function show($id)
    {
        return Test::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'test_name' => 'required|string',
            'test_results' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $test = Test::create([
            'user_id' => $request->user_id,
            'test_name' => $request->test_name,
            'test_results' => $request->test_results,
        ]);

        return response()->json($test, 201);
    }

    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());
        return response()->json($test);
    }

    public function destroy($id)
    {
        Test::destroy($id);
        return response()->json(['message' => 'Test deleted']);
    }
}
