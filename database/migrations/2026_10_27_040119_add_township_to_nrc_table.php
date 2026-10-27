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
        Schema::table('nrc', function (Blueprint $table) {
            $table->string('township')->nullable();
            $table->string('number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nrc', function (Blueprint $table) {
            $table->dropColumn(['township', 'number']);
        });
    }
};
