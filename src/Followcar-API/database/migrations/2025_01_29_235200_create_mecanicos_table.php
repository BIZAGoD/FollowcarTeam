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
        Schema::create('Mecanicos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Telefono');
            $table->string('Email');
            $table->timestamps();
        });

        DB::table('Mecanicos')->insert([
            'Nombre' => 'Juan',
            'Apellido' => 'Perez',
            'Telefono' => '12345678',
            'Email' => 'juanchotacorta@gmail.com',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mecanicos');
    }
};
