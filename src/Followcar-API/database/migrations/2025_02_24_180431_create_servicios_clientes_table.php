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
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->boolean('estado');
            $table->string('observacion');
            $table->integer('duracion');
            $table->string('pieza');
            $table->boolean('estado_pieza');
            $table->timestamps();
        });

        DB::table('ServiciosClientes')->insert([
            'nombre' => 'Servicio 1',
            'descripcion' => 'Descripción del servicio 1',
            'estado' => true,
            'observacion' => 'Observación del servicio 1',
            'duracion' => 10,
            'pieza' => 'Pieza 1',
            'estado_pieza' => true,
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
