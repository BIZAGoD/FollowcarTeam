<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pagos::all();
        return response()->json($pagos,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'FacturaId' => 'required|integer',
            'Monto' => 'required|numeric',
            'FechaPago' => 'required|date',
            'MetodoPago' => 'required|string',
            'Estado' => 'required|string',
        ]);

        $pago = Pagos::create($validation);
        return response()->json($pago, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pago = Pagos::find($id);
        return response()->json($pago, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'FacturaId' => 'required|integer',
            'Monto' => 'required|numeric',
            'FechaPago' => 'required|date',
            'MetodoPago' => 'required|string',
            'Estado' => 'required|string',
        ]);

        $pago = Pagos::find($id);
        $pago->update($validation);
        return response()->json($pago, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago = Pagos::find($id);
        $pago->delete();
        return response()->json(null, 204);
    }
}
