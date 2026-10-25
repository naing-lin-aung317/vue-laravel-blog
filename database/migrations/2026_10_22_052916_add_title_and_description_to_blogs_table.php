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
        if (Schema::hasColumn('blogs', 'title') && Schema::hasColumn('blogs', 'description')) {
            return;
        }

        Schema::table('blogs', function (Blueprint $table) {
            if (! Schema::hasColumn('blogs', 'title')) {
                $table->string('title');
            }

            if (! Schema::hasColumn('blogs', 'description')) {
                $table->text('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
    }
};
