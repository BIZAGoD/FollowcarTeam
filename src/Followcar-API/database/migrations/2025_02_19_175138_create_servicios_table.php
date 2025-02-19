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
        Schema::create('Servicios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->decimal('Precio', 8, 2);
            $table->integer('Duracion');
            $table->timestamps();
        });

        DB::table('Servicios')->insert([
            'Nombre' => 'Limpieza', //Nombre del servicio a realizar
            'Descripcion' => 'Limpieza de todo el auto', //Descripción de que hará el servicio
            'Precio' => 100, //Precio en decimales
            'Duracion' => 1 //Duración en horas
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Servicios');
    }
};
