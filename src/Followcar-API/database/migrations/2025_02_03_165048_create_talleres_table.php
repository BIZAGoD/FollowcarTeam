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
        Schema::create('Talleres', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Horario');
            $table->string('Logo');
            $table->timestamps();
        });

        DB::table('Talleres')->insert([
            'Nombre' => 'Taller de Prueba',
            'Direccion' => 'Calle 123',
            'Telefono' => '1234567890',
            'Email' => 'taller@gmail.com',
            'Horario' => 'Lunes a Viernes de 9:00 a 18:00',
            'Logo' => 'logo.png',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Talleres');
    }
};
