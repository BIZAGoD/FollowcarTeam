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
        Schema::create('CitasClientes', function (Blueprint $table) {
            $table->id(); //'Nombre', 'Apellido', 'Telefono', 'Email', 'Modelo', 'Marca', 'Año', 'Placas', 'FechaCita'
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Modelo');
            $table->string('Marca');
            $table->string('Anio');
            $table->string('Placas');
            $table->date('FechaCita');
            $table->timestamps();
        });

        DB::table('CitasClientes')->insert([
            'Nombre' => 'Pedro',
            'Apellido' => 'Hernandez',
            'Telefono' => '123456789',
            'Email' => 'pedro@gmail.com',
            'Modelo' => 'Fiesta-ikon',
            'Marca' => 'Ford',
            'Anio' => '2013',
            'Placas' => 'IWKJ-9384',
            'FechaCita' => '2025-02-28 18:00'

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CitasClientes');
    }
};
