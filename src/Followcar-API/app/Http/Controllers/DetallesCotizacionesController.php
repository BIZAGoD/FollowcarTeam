<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesCotizaciones;

class DetallesCotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallesCotizaciones = DetallesCotizaciones::all();
        return response()->json($detallesCotizaciones, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'cotizacion_id' => 'required|int|max:255',
            'tipo' => 'required|string|max:255',
            'pieza_id' => 'required|int|max:255',
            'servicio_id' => 'required|int|max:255',
            'descripcion' => 'required|string|max:255',
            'cantidad' => 'required|int|max:255',
            'precio_unitario' => 'required|numeric|max:255',
            'subtotal' => 'required|numeric|max:255',
            'notas' => 'required|string|max:255',
        ]);

        $detalleCotizacion = DetallesCotizaciones::create($validatedData);
        return response()->json($detalleCotizacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalleCotizacion = DetallesCotizaciones::find($id);

        if (!$detalleCotizacion) {
            return response()->json(['message' => 'DetalleCotizacion not found'], 404);
        }

        return response()->json($detalleCotizacion, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalleCotizacion = DetallesCotizaciones::find($id);

        if (!$detalleCotizacion) {
            return response()->json(['message' => 'DetalleCotizacion not found'], 404);
        }

        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'cotizacion_id' => 'required|int|max:255',
            'tipo' => 'required|string|max:255',
            'pieza_id' => 'required|int|max:255',
            'servicio_id' => 'required|int|max:255',
            'descripcion' => 'required|string|max:255',
            'cantidad' => 'required|int|max:255',
            'precio_unitario' => 'required|numeric|max:255',
            'subtotal' => 'required|numeric|max:255',
            'notas' => 'required|string|max:255',
        ]);

        $detalleCotizacion->update($validatedData);
        return response()->json($detalleCotizacion, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalleCotizacion = DetallesCotizaciones::find($id);

        if (!$detalleCotizacion) {
            return response()->json(['message' => 'DetalleCotizacion not found'], 404);
        }

        $detalleCotizacion->delete();
        return response()->json(['message' => 'DetalleCotizacion deleted successfully'], 200);
    }
}
