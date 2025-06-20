<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
           Schema::create('persona_vehiculo', function (Blueprint $table){
        $table->unsignedBigInteger('usuario_id')->nullable();
        $table->unsignedBigInteger('vehiculo_id')->nullable();
        $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
        $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('set null');
           });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_vehiculo');

    }
};
