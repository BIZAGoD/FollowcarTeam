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
        $validate = $request->validate([
            'Nombre' => 'required|string',
            'Direccion' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string',
            'Logo' => 'required|string',
        ]);

        $taller = Talleres::create($validate);
        return response()->json($taller, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taller = Talleres::find($id);
        return response()->json($taller, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'Nombre' => 'required|string',
            'Direccion' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string',
            'Logo' => 'required|string',
        ]);

        $taller = Talleres::find($id);
        $taller->update($validate);
        return response()->json($taller, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taller = Talleres::find($id);
        $taller->delete();
        return response()->json(null, 204);
    }
}
