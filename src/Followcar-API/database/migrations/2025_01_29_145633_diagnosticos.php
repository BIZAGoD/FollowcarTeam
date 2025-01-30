<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Diagnosticos;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('Diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CitaId');
            $table->unsignedBigInteger('MecanicoId');
            $table->string('Estado');
            $table->string('DescripcionProblema');
            $table->string('DiagnosticoDetallado');
            $table->string('Recomendaciones');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->string('FotosEvidencia');
            $table->timestamps();
        });

        DB::table('Diagnosticos')->insert([
            'CitaId' => '1',
            'MecanicoId' => '1',
            'Estado' => 'En proceso',
            'DescripcionProblema' => 'Problema 1',
            'DiagnosticoDetallado' => 'Diagnostico 1',
            'Recomendaciones' => 'Recomendacion 1',
            'FechaInicio' => '2025-01-29',
            'FechaFin' => '2025-01-29',
            'FotosEvidencia' => 'Foto 1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Diagnosticos');
    }
};
