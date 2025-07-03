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
        Schema::create('user_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuarios')->constrained('usuarios') ->onDelete('cascade');
            $table->foreignId('id_vehiculos') ->constrained('vehiculos') ->onDelete('cascade');
            $table->string('patente')->unique()->nullable();
            $table->timestamps();
            $table->unique(['id_usuarios', 'id_vehiculos']);
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('user_vehicle');
    }
};
