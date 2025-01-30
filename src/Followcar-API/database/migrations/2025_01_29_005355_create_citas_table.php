<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; //Nunca olvidar lo importante de marcar a DB Support Facade. El otro DB NO funciona.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ClienteId');
            $table->unsignedBigInteger('VehiculoId');
            $table->unsignedBigInteger('TipoServicioId');
            $table->unsignedBigInteger('MecanicoId');
            $table->date('FechaHora');
            $table->string('Estado');
            $table->string('MotivoCancelacion')->nullable();
            $table->text('ObservacionesCliente')->nullable();
            $table->text('ObservacionesInternas')->nullable();
            $table->string('Prioridad');
            $table->timestamps();
        });

        DB::table('Citas')->insert([
            'ClienteId' => '1',
            'VehiculoId' => '1',
            'TipoServicioId' => '1',
            'MecanicoId' => '1',
            'FechaHora' => '2025-01-29',
            'Estado' => 'Pendiente',
            'MotivoCancelacion' => 'No se presento',
            'ObservacionesCliente' => 'Cliente no se presento',
            'ObservacionesInternas' => 'Cliente no se presento',
            'Prioridad' => 'Alta',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Citas');
    }
};
