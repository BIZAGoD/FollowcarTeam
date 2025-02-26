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
        Schema::create('ServiciosClientes', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('taller');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('observacion');
            $table->integer('duracion');
            $table->string('pieza');
            $table->string('estado_pieza');
        });

        DB::table('ServiciosClientes')->insert([
            'Email' => 'test@test.com',
            'taller' => 'Taller 1',
            'nombre' => 'Servicio 1',
            'descripcion' => 'Descripción del servicio 1',
            'estado' => 'pendiente',
            'observacion' => 'Observación del servicio 1',
            'duracion' => 10,
            'pieza' => 'Pieza 1',
            'estado_pieza' => 'Buena',
        ]);
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ServiciosClientes');
    }
};
