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
        if (! Schema::hasTable('nrc')) {
            Schema::create('nrc', function (Blueprint $table) {
                $table->id();
                $table->string('township')->nullable();
                $table->string('number')->nullable();
                $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
                $table->timestamps();
            });

            return;
        }

        if (! Schema::hasColumn('nrc', 'user_id')) {
            Schema::table('nrc', function (Blueprint $table) {
                $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('nrc') || ! Schema::hasColumn('nrc', 'user_id')) {
            return;
        }

        Schema::table('nrc', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
