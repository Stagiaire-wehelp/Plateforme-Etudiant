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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('lieu');
            $table->string('statue');
            $table->timestamps();
            $table->unsignedBigInteger('universitaire_id');

            // Définition de la contrainte de clé étrangère
            $table->foreign('universitaire_id')->references('id')->on('universitaires')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
