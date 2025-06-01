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
           Schema::create('consulta_servicio', function (Blueprint $table){
        $table->id();
        $table->unsignedBigInteger('consulta_id')->nullable();
        $table->unsignedBigInteger('servicio_id')->nullable();
        $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('set null');
        $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('set null');
        $table->timestamps();
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('consulta_servicio');

    }
};
