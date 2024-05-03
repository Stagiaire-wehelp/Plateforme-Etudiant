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
        Schema::create('universite_statistiques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universitaire_id');
            $table->date('date');
            $table->unsignedInteger('nbr_visite')->default(0);
            $table->timestamps();
        
            $table->foreign('universitaire_id')->references('id')->on('universitaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universite_statistiques');
    }
};
