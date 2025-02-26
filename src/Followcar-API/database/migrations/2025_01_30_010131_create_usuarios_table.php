
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
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->string('Email')->primary();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Telefono');
            $table->string('Clave');
            $table->longText('Imagen')->nullable(); // Changed to longText for base64 images
            $table->timestamps();
        });

        // Insert a sample user
        DB::table('Usuarios')->insert([
            'Email' => 'juanjo@gmail.com',
            'Nombre' => 'Juan',
            'Apellido' => 'Perez',
            'Telefono' => '12345678',
            'Clave' => '12345678', // Hash password for security
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuarios');
    }
};
