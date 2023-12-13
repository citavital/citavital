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
        Schema::create('hospital_doctor_horarios', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->foreignUuid('hospital_doctor_id')
                ->references('id')
                ->on('doctor_hospitales')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->enum('dia_semana', ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'])->nullable();
            $table->enum('bloques', ['30', '60'])->default('60');
            $table->time('inicio')->nullable();
            $table->time('fin')->nullable();
            $table->time('descanso')->nullable();
            $table->time('fin_descanso')->nullable();
            $table->date('ignorar')->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hospital_doctor_horarios', function (Blueprint $table) {
            $table->dropForeign(['hospital_doctor_id']);
        });

        Schema::dropIfExists('hospital_doctor_horarios');
    }
};
