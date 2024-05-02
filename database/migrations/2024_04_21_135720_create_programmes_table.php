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
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->string('emplacement_geographique');
            $table->string('langue_enseignement');
            $table->string('niveau_etude');
            $table->string('nom');
            $table->string('possibilite_financement');
            $table->integer('duree');
            $table->double('frais_scolarite');
            $table->timestamps();
        });
        Schema::table('domaine_etudes', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Programme::class)->nullable()->constrained()->cascadeOnDelete();
            
        }); 
         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
        
         Schema::table('domaine_etudes', function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\Programme::class);
        }); 
         
    }
};
