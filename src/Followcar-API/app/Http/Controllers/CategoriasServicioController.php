<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasServicio;

class CategoriasServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriasServicio = CategoriasServicio::all();
        return response()->json($categoriasServicio, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            // Add other fields and validations as needed
        ]);

        $categoriaServicio = CategoriasServicio::create($validatedData);
        return response()->json($categoriaServicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoriaServicio = CategoriasServicio::find($id);

        if (!$categoriaServicio) {
            return response()->json(['message' => 'CategoriaServicio not found'], 404);
        }

        return response()->json($categoriaServicio, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoriaServicio = CategoriasServicio::find($id);

        if (!$categoriaServicio) {
            return response()->json(['message' => 'CategoriaServicio not found'], 404);
        }

        $validatedData = $request->validate([
            'id' => 'sometimes|required|int|max:255',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:255',
            'icon' => 'sometimes|required|string|max:255',
            // Add other fields and validations as needed
        ]);

        $categoriaServicio->update($validatedData);
        return response()->json(['message' => 'CategoriaServicio updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoriaServicio = CategoriasServicio::find($id);

        if (!$categoriaServicio) {
            return response()->json(['message' => 'CategoriaServicio not found'], 404);
        }

        $categoriaServicio->delete();
        return response()->json(['message' => 'CategoriaServicio deleted successfully'], 204);
    }
}
