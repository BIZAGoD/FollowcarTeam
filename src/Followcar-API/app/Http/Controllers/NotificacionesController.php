<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificaciones = Notificaciones::all();
        return response()->json($notificaciones,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'UsuarioId' => 'required|int',
            'Mensaje' => 'required|string',
            'FechaEnvio' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $notificacion = Notificaciones::create($validation);
        return response()->json($notificacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notificacion = Notificaciones::find($id);
        if($notificacion){
            return response()->json($notificacion, 200);
        }else{
            return response()->json('Notificación no encontrada', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'UsuarioId' => 'required|int',
            'Mensaje' => 'required|string',
            'FechaEnvio' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $notificacion = Notificaciones::find($id);
        if($notificacion){
            $notificacion->update($validation);
            return response()->json($notificacion, 200);
        }else{
            return response()->json('Notificación no encontrada', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notificacion = Notificaciones::find($id);
        if($notificacion){
            $notificacion->delete();
            return response()->json('Notificación eliminada', 200);
        }else{
            return response()->json('Notificación no encontrada', 404);
        }
    }
}
