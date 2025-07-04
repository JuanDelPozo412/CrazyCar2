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

            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->foreignId('empleado_id')->nullable()->constrained('usuarios')->onDelete('set null');

            $table->string('tipo');
            $table->enum('estado', ['Nueva', 'En Proceso', 'Finalizada'])->default('Nueva');
            $table->date('fecha');
            $table->time('horario')->nullable();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->string('nombre_guest')->nullable(); 
            $table->string('email_guest')->nullable(); 
            $table->string('apellido_guest')->nullable();
            



            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
