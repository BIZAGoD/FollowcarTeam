<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizaciones;

class CotizacionesController extends Controller
{
    /**
     * Muestra todas las cotizaciones.
     */
    public function index()
    {
        $cotizaciones = Cotizaciones::all();
        return response()->json($cotizaciones, 200);
    }

    /**
     * Almacena una nueva cotización en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Id' => 'required|integer',
            'DiagnosticoId' => 'required|integer',
            'NumeroCotizacion' => 'required|integer',
            'Subtotal' => 'required|numeric',
            'IVA' => 'required|numeric',
            'Total' => 'required|numeric',
            'Estado' => 'required|string',
            'MotivoRechazo' => 'nullable|string',
            'FechaAprobacion' => 'required|date',
            'FechaExpiracion' => 'required|date',
        ]);

        $cotizacion = Cotizaciones::create($validatedData);
        return response()->json($cotizacion, 201);
    }

    /**
     * Muestra una cotización específica.
     */
    public function show(string $id)
    {
        $cotizacion = Cotizaciones::find($id);

        if (!$cotizacion) {
            return response()->json(['message' => 'Cotización no encontrada'], 404);
        }

        return response()->json($cotizacion, 200);
    }

    /**
     * Actualiza una cotización existente.
     */
    public function update(Request $request, string $id)
    {
        $cotizacion = Cotizaciones::find($id);

        if (!$cotizacion) {
            return response()->json(['message' => 'Cotización no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'Id' => 'required|integer',
            'DiagnosticoId' => 'required|integer',
            'NumeroCotizacion' => 'required|integer',
            'Subtotal' => 'required|numeric',
            'IVA' => 'required|numeric',
            'Total' => 'required|numeric',
            'Estado' => 'required|string',
            'MotivoRechazo' => 'nullable|string',
            'FechaAprobacion' => 'required|date',
            'FechaExpiracion' => 'required|date',
        ]);

        $cotizacion->update($validatedData);
        return response()->json(['message' => 'Cotización actualizada con éxito'], 200);
    }

    /**
     * Elimina una cotización de la base de datos.
     */
    public function destroy(string $id)
    {
        $cotizacion = Cotizaciones::find($id);

        if (!$cotizacion) {
            return response()->json(['message' => 'Cotización no encontrada'], 404);
        }

        $cotizacion->delete();
        return response()->json(['message' => 'Cotización eliminada con éxito'], 204);
    }
}
