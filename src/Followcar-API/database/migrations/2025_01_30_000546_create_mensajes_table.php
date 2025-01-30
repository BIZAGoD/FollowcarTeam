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
        Schema::create('Mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('Contenido');
            $table->integer('RemitenteId');
            $table->integer('DestinatarioId');
            $table->timestamp('FechaEnvio');
            $table->string('Estado');
            $table->timestamps();
        });

        DB::table('Mensajes')->insert([
            'Contenido' => 'Hola, ¿cómo estás?',
            'RemitenteId' => 1,
            'DestinatarioId' => 2,
            'FechaEnvio' => '2025-01-30 00:00:00',
            'Estado' => 'Enviado',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mensajes');
    }
};
