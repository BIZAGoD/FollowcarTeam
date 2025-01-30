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
        Schema::create('DocumentosVehiculo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('VehiculoId');
            $table->string('Tipo');
            $table->string('ArchivoUrl');
            $table->date('FechaVencimiento');
            //$table->foreign('VehiculoId')->references('id')->on('vehiculos');
            $table->timestamps();
        });

        DB::table('DocumentosVehiculo')->insert([
            'VehiculoId' => '1',
            'Tipo' => 'Tipo 1',
            'ArchivoUrl' => 'Archivo 1',
            'FechaVencimiento' => '2025-01-29',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DocumentosVehiculo');
    }
};
