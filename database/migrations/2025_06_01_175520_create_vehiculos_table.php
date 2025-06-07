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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('patente');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');
            $table->string('color');
            $table->string('tipo');
            $table->string('combustible');
            $table->string('imagen');
            $table->unsignedBigInteger('concesionaria_id')->nullable();
            $table->foreign('concesionaria_id')->references('id')->on('concesionarias')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
