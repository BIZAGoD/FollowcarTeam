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
        Schema::create('rescates', function (Blueprint $table) {
            $table->string('nombre')->primary();
            $table->string('taller');
            $table->string('email');
            $table->date('fecha');
            $table->string('lugar');
            $table->string('estado');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        DB::table('rescates')->insert([
            'nombre' => 'Juan Perez',
            'taller' => 'Taller de Mecanica',
            'email' => 'juan.perez@gmail.com',
            'fecha' => '2025-03-02',
            'lugar' => 'Santiago',
            'estado' => 'pendiente',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescates');
    }
};
