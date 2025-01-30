<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiposServicio;

class TiposServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposServicio = TiposServicio::all();
        return response()->json($tiposServicio,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
        ]);

        $tipoServicio = TiposServicio::create($validation);
        return response()->json($tipoServicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoServicio = TiposServicio::find($id);
        return response()->json($tipoServicio, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
        ]);

        $tipoServicio = TiposServicio::find($id);
        $tipoServicio->update($validation);
        return response()->json($tipoServicio, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoServicio = TiposServicio::find($id);
        $tipoServicio->delete();
        return response()->json(null, 204);
    }
}
