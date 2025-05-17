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
        Schema::create('age_agendamientos', function (Blueprint $table) {
            $table->id();
            $table->uuid('guid');
            $table->boolean('autoriza_uso_datos')->default(0);

            $table->foreignId('id_vehiculo')->nullable()->index();
            $table->foreign('id_vehiculo')->references('id')->on('age_vehiculos');
            $table->string('placa', 150)->nullable();
            $table->string('propetario', 150)->nullable();
            $table->string('telefono', 150)->nullable();
            $table->string('email', 150)->nullable();

            $table->foreignId('id_marca')->nullable()->index();
            $table->foreign('id_marca')->references('id')->on('age_marcas');
            /* $table->string('mombre_marca', 150)->nullable(); */

            $table->foreignId('id_modelo')->nullable()->index();
            $table->foreign('id_modelo')->references('id')->on('age_modelos');
           /*  $table->string('mombre_modelo', 150)->nullable(); */

            $table->foreignId('id_taller')->nullable()->index();
            $table->foreign('id_taller')->references('id')->on('age_talleres');
           /*  $table->string('nombre_taller', 150)->nullable();
            $table->string('ciudad_taller', 150)->nullable();
            $table->string('direccion_taller', 150)->nullable();
            $table->string('telefono_taller', 150)->nullable(); */

            $table->foreignId('id_tecnico')->nullable()->index();
            $table->foreign('id_tecnico')->references('id')->on('age_tecnicos');
            //$table->string('nombre_tecnico', 150)->nullable();

            $table->foreignId('id_mantenimiento')->nullable()->index();
            $table->foreign('id_mantenimiento')->references('id')->on('age_mantenimientos');

            $table->string('id_correctivo', 150)->nullable();

            $table->date('fecha_agenda');
            $table->time('hora_agenda');

            $table->string('observacion', 1000)->nullable();

            $table->char('estado', 1)->default('1')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('age_agendamientos');
    }
};
