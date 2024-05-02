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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('entreprise');
            $table->string('lieu');
            $table->string('statue');
            $table->string('titre');
            $table->enum('type_offre', ['stage', 'offre_emploi']);
            $table->unsignedBigInteger('universitaire_id');
            $table->foreign('universitaire_id')->references('id')->on('universitaires')->nullable()->onDelete('cascade');
            $table->integer('nbr_places');
            $table->double('salaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
