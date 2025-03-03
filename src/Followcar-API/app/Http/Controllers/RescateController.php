<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescates;

class RescateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescates = Rescates::all();
        return response()->json($rescates, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre' => 'required|string',
            'taller' => 'required|string',
            'email' => 'required|email',
            'fecha' => 'required|date',
            'lugar' => 'required|string',
            'estado' => 'required|string',  // Add this line
        ]);
        $rescates = Rescates::create($validation);
        return response()->json($rescates, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rescates = Rescates::find($id);
        return response()->json($rescates, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'nombre' => 'required|string',
            'taller' => 'required|string',
            'email' => 'required|email',
            'fecha' => 'required|date',
            'lugar' => 'required|string',
            'estado' => 'required|string',  // Add this line
        ]); 
        $rescates = Rescates::find($id);
        $rescates->update($validation);
        return response()->json($rescates, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rescates = Rescates::find($id);
        $rescates->delete();
        return response()->json(null, 204);
    }
}
