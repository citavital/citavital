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
        Schema::create('citas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('doctor_id');

            $table->foreignUuid('hospital_id')
                ->references('id')
                ->on('hospitales')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->date('fecha');
            $table->time('hora');
            $table->boolean('cancelada')->default(false);
            $table->timestamps();

            $table->foreign('usuario_id')
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
        Schema::table('citas', function(Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['hospital_id']);
        });

        Schema::dropIfExists('citas');
    }
};
