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
        Schema::create('Pagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('FacturaId');
            //$table->foreignId('FacturaId')->constrained('facturas');
            $table->decimal('Monto', 8, 2);
            $table->date('FechaPago');
            $table->string('MetodoPago', 50);
            $table->string('Estado', 50);
            $table->timestamps();
        });

        DB::table('Pagos')->insert([
            'FacturaId' => 1,
            'Monto' => 100.00,
            'FechaPago' => '2025-01-30',
            'MetodoPago' => 'Efectivo',
            'Estado' => 'Pagado',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pagos');
    }
};
