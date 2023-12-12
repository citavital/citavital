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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('genero', ['hombre', 'mujer', 'otro'])->nullable()->default(null);
            $table->enum('tipo_usuario', ['admin', 'paciente', 'doctor'])->default('paciente');
            $table->longText('direccion')->nullable()->default(null);
            $table->string('telefono')->nullable()->default(null);
            $table->string('celular')->nullable()->default(null);
            $table->decimal('altura')->nullable()->default(null);
            $table->decimal('peso')->nullable()->default(null);
            $table->decimal('imc')->nullable()->default(null);
            $table->string('presion_arterial')->nullable()->default(null);
            $table->date('nacimiento')->nullable()->default(null);
            $table->bigInteger('votos')->default(0);
            $table->decimal('rating', 4, 2)->default(0);
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('genero');
            $table->dropColumn('tipo_usurio');
            $table->dropColumn('direccion');
            $table->dropColumn('telefono');
            $table->dropColumn('celular');
            $table->dropColumn('altura');
            $table->dropColumn('peso');
            $table->dropColumn('imc');
            $table->dropColumn('presion_arterial');
            $table->dropColumn('nacimiento');
            $table->dropColumn('votos');
            $table->dropColumn('rating');
            $table->dropColumn('activo');
        });
    }
};
