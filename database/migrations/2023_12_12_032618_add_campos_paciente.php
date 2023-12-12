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
            $table->longText('alergias')->nullable();
            $table->enum('tipo_altura', ['metros', 'pies'])->nullable()->after('altura');
            $table->enum('tipo_peso', ['libras', 'kilos'])->nullable()->after('peso');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('alergias');
            $table->dropColumn('tipo_altura');
            $table->dropColumn('tipo_peso');
        });
    }
};
