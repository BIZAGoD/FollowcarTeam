<?php

namespace App\Http\Controllers;

use App\Models\Inventarios;
use Illuminate\Http\Request;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = Inventarios::all();
        return response()->json($inventarios,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Cantidad' => 'required|int',
            'Precio' => 'required|numeric',
            'CategoriaId' => 'required|int',
        ]);

        $inventario = Inventarios::create($validation);
        return response()->json($inventario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventario = Inventarios::find($id);
        if($inventario){
            return response()->json($inventario, 200);
        }else{
            return response()->json('Inventario no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Cantidad' => 'required|int',
            'Precio' => 'required|numeric',
            'CategoriaId' => 'required|int',
        ]);

        $inventario = Inventarios::find($id);
        if($inventario){
            $inventario->update($validation);
            return response()->json($inventario, 200);
        }else{
            return response()->json('Inventario no encontrado', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventario = Inventarios::find($id);
        if($inventario){
            $inventario->delete();
            return response()->json('Inventario eliminado', 200);
        }else{
            return response()->json('Inventario no encontrado', 404);
        }
    }
}
