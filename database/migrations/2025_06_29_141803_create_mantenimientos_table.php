<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');

            $table->string('marca');
            $table->string('modelo');
            $table->string('patente');

            $table->enum('motivo', [
                'Cambio de Aceite',
                'Alineacion y Balanceo',
                'Cambio de Filtro',
                'Revision de Frenos',
                'Mantenimiento General'
            ]);
            $table->enum('estado', ['Nuevo', 'En Proceso', 'Finalizado'])->default('Nuevo');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('imagen')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
