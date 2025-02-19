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
        Schema::create('Facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ClienteId');
            //$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->date('Fecha');
            $table->decimal('Total', 8, 2);
            $table->string('Estado');
            $table->timestamps();
        });

        DB::table('Facturas')->insert([
            'ClienteId' => 1,
            'Fecha' => '2025-01-29',
            'Total' => 100.00,
            'Estado' => 'pendiente',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Facturas');
    }
};
