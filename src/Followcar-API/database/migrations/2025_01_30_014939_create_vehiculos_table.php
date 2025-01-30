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
        Schema::create('Vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('Modelo');
            $table->string('Marca');
            $table->string('Anio');
            $table->string('Color');
            $table->string('Placa');
            $table->timestamps();
        });

        DB::table('Vehiculos')->insert([
            'Modelo' => 'Modelo 1',
            'Marca' => 'Marca 1',
            'Anio' => '2021',
            'Color' => 'Color 1',
            'Placa' => 'Placa 1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Vehiculos');
    }
};
