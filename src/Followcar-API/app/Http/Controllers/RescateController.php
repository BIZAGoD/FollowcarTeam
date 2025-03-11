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
            'email' => 'required|email',
            'fecha' => 'required|date',
            'problema' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|string',  // Add this line
            'latitud' => 'nullable|string',
            'longitud' => 'nullable|string',
        ]);
        $validation['fecha'] = \Carbon\Carbon::createFromFormat('d-m-Y', $validation['fecha'])->format('Y-m-d');
        $rescates = Rescates::create($validation);
        return response()->json($rescates, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $rescates = Rescates::find($email);
        return response()->json($rescates, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {
        $validation = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'fecha' => 'required|date',
            'problema' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|string',  // Add this line
            'latitud' => 'nullable|string',
            'longitud' => 'nullable|string',
        ]); 
        $rescates = Rescates::find($email);

        $validation['fecha'] = \Carbon\Carbon::createFromFormat('d-m-Y', $validation['fecha'])->format('Y-m-d');
        $rescates->update($validation);
        return response()->json($rescates, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $rescates = Rescates::find($email);
        $rescates->delete();
        return response()->json(null, 204);
    }
}
