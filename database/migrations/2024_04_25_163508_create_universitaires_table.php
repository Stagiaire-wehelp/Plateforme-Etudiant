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
        Schema::create('universitaires', function (Blueprint $table) {
            $table->id();
            $table->string('adresse');
            $table->string('nom');
            $table->string('site_web');
            $table->string('type');
            $table->string('tel');
            $table->timestamps();
        });
        Schema::table('ecoles', function(Blueprint $table){
            $table->foreignIdFor(\App\Models\Universitaire::class)->nullable()->constrained()->cascadeOnDelete(); 
       }); 

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitaires');
        Schema::table('ecoles', function(Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Universitaire::class);
        }); 
        Schema::table('evenements', function(Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Universitaire::class);
        }); 
        Schema::table('offres', function(Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Universitaire::class);
        });
    }
};
