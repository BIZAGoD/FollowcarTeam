<?php

namespace App\Http\Controllers;
use App\Models\DocumentosVehiculo;
use Illuminate\Http\Request;

class DocumentosVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentosVehiculo = DocumentosVehiculo::all();
        return response()->json($documentosVehiculo, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'VehiculoId' => 'required|int|max:255',
            'Tipo' => 'required|string|max:255',
            'ArchivoUrl' => 'required|string|max:255',
            'FechaVencimiento' => 'required|date|max:255',
        ]);

        $documentoVehiculo = DocumentosVehiculo::create($validatedData);
        return response()->json($documentoVehiculo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documentoVehiculo = DocumentosVehiculo::find($id);

        if (!$documentoVehiculo) {
            return response()->json(['message' => 'DocumentoVehiculo not found'], 404);
        }

        return response()->json($documentoVehiculo, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $documentoVehiculo = DocumentosVehiculo::find($id);

        if (!$documentoVehiculo) {
            return response()->json(['message' => 'DocumentoVehiculo not found'], 404);
        }

        $validatedData = $request->validate([
            'VehiculoId' => 'required|int|max:255',
            'Tipo' => 'required|string|max:255',
            'ArchivoUrl' => 'required|string|max:255',
            'FechaVencimiento' => 'required|date|max:255',
        ]);

        $documentoVehiculo->VehiculoId = $validatedData['VehiculoId'];
        $documentoVehiculo->Tipo = $validatedData['Tipo'];
        $documentoVehiculo->ArchivoUrl = $validatedData['ArchivoUrl'];
        $documentoVehiculo->FechaVencimiento = $validatedData['FechaVencimiento'];
        $documentoVehiculo->save();

        return response()->json($documentoVehiculo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documentoVehiculo = DocumentosVehiculo::find($id);

        if (!$documentoVehiculo) {
            return response()->json(['message' => 'DocumentoVehiculo not found'], 404);
        }

        $documentoVehiculo->delete();
        return response()->json(['message' => 'DocumentoVehiculo deleted successfully'], 200);
    }
}
