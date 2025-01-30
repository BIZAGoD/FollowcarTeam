<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::all();
        return response()->json($roles,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
        ]);

        $rol = Roles::create($validation);
        return response()->json($rol, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Roles::find($id);
        return response()->json($rol, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
        ]);

        $rol = Roles::find($id);
        $rol->update($validation);
        return response()->json($rol, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Roles::find($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}
