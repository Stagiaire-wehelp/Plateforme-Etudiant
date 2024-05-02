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
        Schema::create('domaine_etudes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('nom');
            $table->timestamps();
        });

         Schema::table('sous_domaines', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\DomaineEtude::class)->nullable()->constrained()->cascadeOnDelete();
            
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domaine_etudes');
         Schema::table('sous_domaines', function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\DomaineEtude::class);
        }); 
    }
};
