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
        Schema::create('CategoriasServicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('icono')->nullable();
            $table->timestamps();
        });

        DB::table('CategoriasServicio')->insert([
            'id' => '1',
            'nombre' => 'Categoria 1',
            'descripcion' => 'Descripcion de la categoria 1',
            'icono' => 'icono1.jpg',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CategoriasServicio');
    }
};
