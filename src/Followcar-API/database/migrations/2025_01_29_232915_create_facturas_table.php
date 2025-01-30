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
            $table->unsignedBigInteger('cliente_id');
            //$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->date('fecha');
            $table->decimal('total', 8, 2);
            $table->string('estado');
            $table->timestamps();
        });

        DB::table('Facturas')->insert([
            'cliente_id' => 1,
            'fecha' => '2025-01-29',
            'total' => 100.00,
            'estado' => 'pendiente',
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
