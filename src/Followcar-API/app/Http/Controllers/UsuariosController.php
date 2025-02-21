<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Telefono' => 'required',
            'Email' => 'required|email',
            'Clave' => 'required',
            'Imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048' // Accept file upload
        ]);
    
        // Handle file upload and convert to base64
        if ($request->hasFile('Imagen')) {
            $imageFile = $request->file('Imagen');
            $validated['Imagen'] = base64_encode(file_get_contents($imageFile));
        }
    
        $usuario = Usuarios::create($validated);
        return response()->json($usuario, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::find($id);
        return response()->json($usuario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Email' => 'required|email',
            'Telefono' => 'required|string',
            'Clave' => 'required|string',
        ]);

        $usuario = Usuarios::find($id);
        $usuario->update($validation);
        return response()->json($usuario, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
