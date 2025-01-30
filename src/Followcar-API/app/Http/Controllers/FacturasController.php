<?php

namespace App\Http\Controllers;
use App\Models\Facturas;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Facturas::all();
        return response()->json($facturas,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'ClienteId' => 'required|int',
            'Fecha' => 'required|date',
            'Total' => 'required|numeric',
            'Estado' => 'required|string',
        ]);

        $factura = Facturas::create($validation);
        return response()->json($factura, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $factura = Facturas::find($id);
        if($factura){
            return response()->json($factura, 200);
        }else{
            return response()->json('Factura no encontrada', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'ClienteId' => 'required|int',
            'Fecha' => 'required|date',
            'Total' => 'required|numeric',
            'Estado' => 'required|string',
        ]);

        $factura = Facturas::find($id);
        if($factura){
            $factura->update($validation);
            return response()->json($factura, 200);
        }else{
            return response()->json('Factura no encontrada', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = Facturas::find($id);
        if($factura){
            $factura->delete();
            return response()->json('Factura eliminada', 200);
        }else{
            return response()->json('Factura no encontrada', 404);
        }
    }
}
