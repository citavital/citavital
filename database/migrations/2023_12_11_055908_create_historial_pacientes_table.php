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
        Schema::create('historial_pacientes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id');
            $table->enum('tipo_historial', ['examen', 'nota', 'medicamento']);
            $table->date('fecha');
            $table->longText('comentarios')->nullable();
            $table->longText('file_url')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')
                ->references('id')
                ->on('users')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign('doctor_id')
                ->references('id')
                ->on('users')
                ->onUpdate('no action')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_pacientes', function (Blueprint $table) {
            $table->dropForeign(['paciente_id']);
            $table->dropForeign(['doctor_id']);
        });
        Schema::dropIfExists('historial_pacientes');
    }
};
