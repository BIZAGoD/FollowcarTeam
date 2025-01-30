<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensajes;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Mensajes::all();
        return response()->json($mensajes,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Contenido' => 'required|string',
            'RemitenteId' => 'required|int',
            'DestinatarioId' => 'required|int',
            'FechaEnvio' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $mensaje = Mensajes::create($validation);
        return response()->json($mensaje, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensaje = Mensajes::find($id);
        if($mensaje){
            return response()->json($mensaje, 200);
        }else{
            return response()->json('Mensaje no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Contenido' => 'required|string',
            'RemitenteId' => 'required|int',
            'DestinatarioId' => 'required|int',
            'FechaEnvio' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $mensaje = Mensajes::find($id);
        if($mensaje){
            $mensaje->update($validation);
            return response()->json($mensaje, 200);
        }else{
            return response()->json('Mensaje no encontrado', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mensaje = Mensajes::find($id);
        if($mensaje){
            $mensaje->delete();
            return response()->json('Mensaje eliminado', 200);
        }else{
            return response()->json('Mensaje no encontrado', 404);
        }
    }
}
