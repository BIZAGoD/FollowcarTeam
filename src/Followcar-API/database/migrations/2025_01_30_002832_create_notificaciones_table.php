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
        Schema::create('Notificaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('UsuarioId');
            $table->string('Mensaje');
            $table->timestamp('FechaEnvio');
            $table->string('Estado');
            $table->timestamps();
        });

        DB::table('Notificaciones')->insert([
            'UsuarioId' => 1,
            'Mensaje' => 'Venta de productos',
            'FechaEnvio' => '2025-01-30 00:00:00',
            'Estado' => 'Enviado',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Notificaciones');
    }
};
