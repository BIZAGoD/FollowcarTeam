<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiciosClientes;
class ServiciosClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = ServiciosClientes::all();
        return response()->json($servicios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'taller' => 'required|string',
            'nombre' => 'required|string',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string',
            'observacion' => 'required|string',
            'duracion' => 'required|integer',
            'pieza' => 'required|string',
            'estado_pieza' => 'required|string'
        ]);
        
        $servicios = ServiciosClientes::create($validated);
        return response()->json($servicios, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicios = ServiciosClientes::find($id);
        if (!$servicios) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }
        return response()->json($servicios, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'taller' => 'required|string',
            'nombre' => 'required|string',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string',
            'observacion' => 'required|string',
            'duracion' => 'required|integer',
            'pieza' => 'required|string',
            'estado_pieza' => 'required|string'
        ]);
        $servicios = ServiciosClientes::find($validated['email']);
        if (!$servicios) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }
        $servicios->update($validated);
        return response()->json($servicios, 203);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $servicios = ServiciosClientes::find($email);
        if (!$servicios) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }
        $servicios->delete();
        return response()->json(['message' => 'Servicio eliminado correctamente'], 204);
    }
}
