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
    Schema::create('consultas', function (Blueprint $table) {
        $table->unsignedBigInteger('concesionaria_id')->nullable();
        $table->unsignedBigInteger('usuario_id')->nullable();
        $table->foreign('concesionaria_id')->references('id')->on('concesionarias')->onDelete('set null');
        $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null'); 
        $table->boolean('estado')->default(false);
         $table->id();
             $table->timestamps();
    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
