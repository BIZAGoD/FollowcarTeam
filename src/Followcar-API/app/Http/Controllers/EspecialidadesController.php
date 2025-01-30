<?php

namespace App\Http\Controllers;
use App\Models\Especialidades;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = Especialidades::all();
        return response()->json($especialidades,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $especialidad = Especialidades::create($validation);
        return response()->json($especialidad, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especialidad = Especialidades::find($id);
        if($especialidad){
            return response()->json($especialidad, 200);
        }else{
            return response()->json('Especialidad no encontrada', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $especialidad = Especialidades::find($id);
        if($especialidad){
            $especialidad->update($validation);
            return response()->json($especialidad, 200);
        }else{
            return response()->json('Especialidad no encontrada', 404);
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $especialidad = Especialidades::find($id);
        if($especialidad){
            $especialidad->delete();
            return response()->json('Especialidad eliminada', 200);
        }else{
            return response()->json('Especialidad no encontrada', 404);
        }
    }
}
