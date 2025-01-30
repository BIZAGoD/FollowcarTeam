<?php

namespace App\Http\Controllers;
use App\Models\MovimientosInventario;
use Illuminate\Http\Request;

class movimientosInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimientosInventario = movimientosInventario::all();
        return response()->json($movimientosInventario,200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'InventarioId' => 'required|int',
            'TipoMovimiento' => 'required|string',
            'Cantidad' => 'required|int',
            'FechaMovimiento' => 'required|date',
            'Descripcion' => 'required|string',
        ]);

        $movimientoInventario = movimientosInventario::create($validation);
        return response()->json($movimientoInventario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movimientoInventario = movimientosInventario::find($id);
        if($movimientoInventario){
            return response()->json($movimientoInventario, 200);
        }else{
            return response()->json('Movimiento de inventario no encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'InventarioId' => 'required|int',
            'TipoMovimiento' => 'required|string',
            'Cantidad' => 'required|int',
            'FechaMovimiento' => 'required|date',
            'Descripcion' => 'required|string',
        ]);

        $movimientoInventario = movimientosInventario::find($id);
        if($movimientoInventario){
            $movimientoInventario->update($validation);
            return response()->json($movimientoInventario, 200);
        }else{
            return response()->json('Movimiento de inventario no encontrado', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movimientoInventario = movimientosInventario::find($id);
        if($movimientoInventario){
            $movimientoInventario->delete();
            return response()->json('Movimiento de inventario eliminado', 200);
        }else{
            return response()->json('Movimiento de inventario no encontrado', 404);
        }
    }
}
