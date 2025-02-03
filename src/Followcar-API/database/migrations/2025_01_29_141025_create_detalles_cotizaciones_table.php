<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\DetallesCotizaciones;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('DetallesCotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CotizacionId');
            $table->string('Tipo');
            $table->unsignedBigInteger('PiezaId')->nullable();
            $table->unsignedBigInteger('ServicioId')->nullable();
            $table->string('Descripcion');
            $table->integer('Cantidad');
            $table->decimal('PrecioUnitario', 8, 2);
            $table->decimal('Subtotal', 8, 2);
            $table->text('Notas')->nullable();
            $table->timestamps();
        });

        DB::table('DetallesCotizaciones')->insert([
            'CotizacionId' => '1',
            'Tipo' => 'Pieza',
            'PiezaId' => '1',
            'Descripcion' => 'Pieza 1',
            'Cantidad' => '1',
            'PrecioUnitario' => '100.00',
            'Subtotal' => '100.00',
            'Notas' => 'Pieza 1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DetalllesCotizaciones');
    }
};
