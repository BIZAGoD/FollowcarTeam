<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculos::all();
        return response()->json($vehiculos,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Modelo' => 'required|string',
            'Marca' => 'required|string',
            'Anio' => 'required|integer',
            'Color' => 'required|string',
            'Placa' => 'required|string',
        ]);

        $vehiculo = Vehiculos::create($validation);
        return response()->json($vehiculo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehiculo = Vehiculos::find($id);
        return response()->json($vehiculo, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Modelo' => 'required|string',
            'Marca' => 'required|string',
            'Anio' => 'required|integer',
            'Color' => 'required|string',
            'Placa' => 'required|string',
        ]);

        $vehiculo = Vehiculos::find($id);
        $vehiculo->update($validation);
        return response()->json($vehiculo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculos::find($id);
        $vehiculo->delete();
        return response()->json(null, 204);
    }
}
