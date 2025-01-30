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
        Schema::create('Cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DiagnosticoId');
            $table->string('NumeroCotizacion');
            $table->decimal('Subtotal', 8, 2);
            $table->decimal('IVA', 8, 2);
            $table->decimal('Total', 8, 2);
            $table->string('Estado');
            $table->string('MotivoRechazo')->nullable();
            $table->date('FechaAprobacion');
            $table->date('FechaExpiracion');
            //$table->foreign('DiagnosticoId')->references('id')->on('diagnosticos');
            $table->timestamps();
        });

        DB::table('Cotizaciones')->insert([
            'DiagnosticoId' => '1',
            'NumeroCotizacion' => '1',
            'Subtotal' => '1000.00',
            'IVA' => '160.00',
            'Total' => '1160.00',
            'Estado' => 'Pendiente',
            'MotivoRechazo' => 'No se acepto el presupuesto',
            'FechaAprobacion' => '2025-01-29',
            'FechaExpiracion' => '2025-02-28',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cotizaciones');
    }
};
