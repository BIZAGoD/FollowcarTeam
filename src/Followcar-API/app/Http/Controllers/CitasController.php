<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Citas;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Citas::all();
        return response()->json($citas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ClienteId' => 'required|integer|exists:clientes,id',
            'VehiculoId' => 'required|integer|exists:vehiculos,id',
            'TipoServicioId' => 'required|integer|exists:tipos_servicios,id',
            'MecanicoId' => 'required|integer|exists:mecanicos,id',
            'FechaHora' => 'required|date',
            'Estado' => 'required',
            'MotivoCancelacion' => 'nullable',
            'ObservacionesCliente' => 'nullable',
            'ObservacionesInternas' => 'nullable',
            'Prioridad' => 'required',
        ]);

        $cita = Citas::create($validatedData);
        return response()->json($cita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Citas::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita not found'], 404);
        }

        return response()->json($cita, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cita = Citas::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita not found'], 404);
        }

        $validatedData = $request->validate([
            'ClienteId' => 'required|integer|exists:clientes,id',
            'VehiculoId' => 'required|integer|exists:vehiculos,id',
            'TipoServicioId' => 'required|integer|exists:tipos_servicios,id',
            'MecanicoId' => 'required|integer|exists:mecanicos,id',
            'FechaHora' => 'required|date',
            'Estado' => 'required',
            'MotivoCancelacion' => 'nullable',
            'ObservacionesCliente' =>'nullable',
            'ObservacionesInternas' => 'nullable',
            'Prioridad' => 'required',
        ]);

        $cita->update($validatedData);
        return response()->json(['message' => 'Cita updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = Citas::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita not found'], 404);
        }

        $cita->delete();
        return response()->json(['message' => 'Cita deleted successfully'], 204);
    }
}
