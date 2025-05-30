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
        Schema::create('age_talleres', function (Blueprint $table) {
            $table->id();
            $table->uuid('guid');
            $table->string('nombre', 150)->nullable();
            $table->string('empresa', 250);
            $table->string('direccion');
            $table->string('ciudad', 150);
            $table->string('telefono', 150);
            $table->char('estado', 1)->default('1')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('age_talleres');
    }
};
