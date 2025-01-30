<?php

namespace App\Http\Controllers;

use App\Models\Mecanicos;
use Illuminate\Http\Request;

class MecanicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mecanicos = Mecanicos::all();
        return response()->json($mecanicos,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
        ]);

        $mecanico = Mecanicos::create($validation);
        return response()->json($mecanico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mecanico = Mecanicos::find($id);
        if($mecanico){
            return response()->json($mecanico, 200);
        }else{
            return response()->json('Mecanico no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
        ]);

        $mecanico = Mecanicos::find($id);
        if($mecanico){
            $mecanico->update($validation);
            return response()->json($mecanico, 200);
        }else{
            return response()->json('Mecanico no encontrado', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mecanico = Mecanicos::find($id);
        if($mecanico){
            $mecanico->delete();
            return response()->json('Mecanico eliminado', 200);
        }else{
            return response()->json('Mecanico no encontrado', 404);
        }
    }
}
