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
        Schema::create('doctor_especialidades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('doctor_id');

            $table->foreign('doctor_id')
                ->references('id')
                ->on('users')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreignUuid('especialidad_id')
                ->references('id')
                ->on('especialidades')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_especialidades', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['especialidad_id']);
        });

        Schema::dropIfExists('doctor_especialidades');
    }
};
