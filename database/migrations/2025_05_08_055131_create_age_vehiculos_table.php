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
        Schema::create('age_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->uuid('guid');
            $table->string('placa', 150)->nullable();
            $table->string('propietario', 250);
            $table->string('email', 150)->nullable();
            $table->string('telefono', 150);
            $table->foreignId('id_marca')->nullable()->index();
            $table->foreign('id_marca')->references('id')->on('age_marcas');
            
            $table->foreignId('id_modelo')->nullable()->index();
            $table->foreign('id_modelo')->references('id')->on('age_modelos');
            $table->char('estado', 1)->default('1')->nullable(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('age_vehiculos');
    }
};
