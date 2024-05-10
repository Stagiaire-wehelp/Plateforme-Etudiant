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
        Schema::table('forum_discussions', function (Blueprint $table) {
            $table->unsignedBigInteger('universitaire_id');
            $table->foreign('universitaire_id')->references('id')->on('universitaires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forum_discussions', function (Blueprint $table) {
            //
        });
    }
};
