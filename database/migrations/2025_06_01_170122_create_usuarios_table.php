<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('dni')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('imagen')->default('icon-person.jpg')->nullable(false);
            $table->string('rol')->default('cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
