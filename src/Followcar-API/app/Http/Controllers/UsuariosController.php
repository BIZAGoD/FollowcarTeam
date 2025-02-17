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
    
        return response()->json($usuarios, 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Email' => 'required|email',
            'Telefono' => 'required|string',
            'Clave' => 'required|string',
            'Imagen' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($request->hasFile('Imagen')) {
            $file = $request->file('Imagen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads');
            
            if (!file_exists($path)) {
                mkdir($path, 0755, true); // Crear carpeta si no existe
            }
        
            $file->move($path, $fileName);
        
            // Construir la URL correcta
            $validation['Imagen'] = url('uploads/' . $fileName);
        }
        
        
    
        $usuario = Usuarios::create($validation);
    
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
