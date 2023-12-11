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
        Schema::create('doctor_hospitales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('doctor_id');

            $table->foreignUuid('hospital_id')
                ->references('id')
                ->on('hospitales')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->boolean('activo')->default(true);
            $table->timestamps();

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
        Schema::table('doctor_hospitales', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['hospital_id']);
        });

        Schema::dropIfExists('doctor_hospitales');
    }
};
