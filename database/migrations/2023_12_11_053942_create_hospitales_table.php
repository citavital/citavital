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
        Schema::create('hospitales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->longText('direccion');
            $table->decimal('latitud');
            $table->decimal('longitud');
            $table->string('telefono_1');
            $table->string('telefono_2')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitales');
    }
};
