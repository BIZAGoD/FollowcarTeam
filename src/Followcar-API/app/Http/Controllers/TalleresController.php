<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talleres;

class TalleresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Talleres::all();
        return response()->json($talleres, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string|unique:Talleres,Nombre',
            'Direccion' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string', 
            'Logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('Logo')) {
            $imageFile = $request->file('Logo');
            $validated['Logo'] = base64_encode
            (file_get_contents($imageFile));
        }
        
        $taller = Talleres::create($validated);
        return response()->json($taller, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taller = Talleres::where('Nombre', $id)->first();
        return response()->json($taller, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string',
            'Direccion' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string',
            'Logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'Rescate' => 'nullable|string'
        ]);

        if ($request->hasFile('Logo')) {
            $imageFile = $request->file('Logo');
            $validated['Logo'] = base64_encode(file_get_contents($imageFile));
        }

        $taller = Talleres::where('Nombre', $id)->first();
        $taller->update($validated);
        return response()->json($taller, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taller = Talleres::where('Nombre', $id)->first();
        $taller->delete();
        return response()->json(null, 204);
    }
}