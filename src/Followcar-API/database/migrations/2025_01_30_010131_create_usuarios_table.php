<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Clave');
            $table->string('Imagen')->nullable(); // Nuevo campo para la imagen
            $table->timestamps();
        });
        
        DB::table('Usuarios')->insert([
            'Nombre' => 'Juan',
            'Apellido' => 'Perez',
            'Telefono' => '12345678',
            'Email' => 'juanjo@gmail.com',
            'Clave' => '12345678'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuarios');
    }
};
