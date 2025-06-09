<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->foreignId('empleado_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculos')->onDelete('set null');

            $table->string('tipo');
            $table->boolean('estado')->default(false);
            $table->date('fecha');
            $table->string('patente')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
