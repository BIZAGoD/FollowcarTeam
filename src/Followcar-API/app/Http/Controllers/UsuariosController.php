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
        return response()->json(Usuarios::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Email' => 'required|email|unique:Usuarios,Email', // Ensure unique Email
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Telefono' => 'required',
            'Clave' => 'required',
            'Imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload (convert image to base64)
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
    public function show(string $email)
    {
        $usuario = Usuarios::where('Email', $email)->firstOrFail();
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {
        $validated = $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Telefono' => 'required',
            'Clave' => 'required',
            'Imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $usuario = Usuarios::where('Email', $email)->firstOrFail();

        // Handle file upload
        if ($request->hasFile('Imagen')) {
            $imageFile = $request->file('Imagen');
            $validated['Imagen'] = base64_encode(file_get_contents($imageFile));
        }

        $usuario->update($validated);
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $usuario = Usuarios::where('Email', $email)->firstOrFail();
        $usuario->delete();
        return response()->json(null, 204);
    }
}
