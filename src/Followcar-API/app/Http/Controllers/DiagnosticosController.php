<?php

namespace App\Http\Controllers;
use App\Models\Diagnosticos;
use Illuminate\Http\Request;
use app\Models\Citas;

class DiagnosticosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosticos = Diagnosticos::all();
        $citas = Citas::all();

        //Optimizar Endpoints ahorrando gets innecesarios.
        $response = [
            'diagnosticos' => $diagnosticos,
            'citas' => $citas,
        ];
        return response()->json($diagnosticos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'CitaId' => 'required|int|max:255',
            'MecanicoId' => 'required|int|max:255',
            'Estado' => 'required|string|max:255',
            'DescripcionProblema' => 'required|string|max:255',
            'DiagnosticoDetallado' => 'required|string|max:255',
            'Recomendaciones' => 'required|string|max:255',
            'FechaInicio' => 'required|date|max:255',
            'FechaFin' => 'required|date|max:255',
            'FotosEvidencia' => 'required|string|max:255',
        ]);

        $diagnostico = Diagnosticos::create($validatedData);
        return response()->json($diagnostico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnostico = Diagnosticos::find($id);

        if (!$diagnostico) {
            return response()->json(['message' => 'Diagnostico not found'], 404);
        }

        return response()->json($diagnostico, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $diagnostico = Diagnosticos::find($id);

        if (!$diagnostico) {
            return response()->json(['message' => 'Diagnostico not found'], 404);
        }

        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'CitaId' => 'required|int|max:255',
            'MecanicoId' => 'required|int|max:255',
            'Estado' => 'required|string|max:255',
            'DescripcionProblema' => 'required|string|max:255',
            'DiagnosticoDetallado' => 'required|string|max:255',
            'Recomendaciones' => 'required|string|max:255',
            'FechaInicio' => 'required|date|max:255',
            'FechaFin' => 'required|date|max:255',
            'FotosEvidencia' => 'required|string|max:255',
        ]);

        $diagnostico->update($validatedData);
        return response()->json($diagnostico, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnostico = Diagnosticos::find($id);

        if (!$diagnostico) {
            return response()->json(['message' => 'Diagnostico not found'], 404);
        }

        $diagnostico->delete();
        return response()->json(['message' => 'Diagnostico deleted successfully'], 200);
    }
}
