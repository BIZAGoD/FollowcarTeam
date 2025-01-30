<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoriasInventario; // Model for CategoriaInventario
use Illuminate\Http\Request;

class CategoriasInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = CategoriasInventario::all();
        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add validation rules
            'id' => 'required|integer', // Example field
            'nombre' => 'required|string|max:255', // Example field
            'descripcion' => 'string|max:255', // Example field
        ]);
        $categoria = CategoriasInventario::create($validatedData);
        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = CategoriasInventario::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'CategoriaInventario not found'], 404);
        }

        return response()->json($categoria, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required|int|max:255',
            'nombre' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        $categoria = CategoriasInventario::find($id);
        $categoria->id = $request->id;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return response()->json($categoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriasInventario::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'CategoriaInventario not found'], 404);
        }

        $categoria->delete();
        return response()->json(['message' => 'CategoriaInventario deleted'], 204);
    }
}
