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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('abreviation');
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('coup_de_projecteurs', function(Blueprint $table){
            $table->foreignIdFor(\App\Models\Ecole::class)->nullable()->constrained()->cascadeOnDelete(); 
       }); 
       Schema::table('programmes', function(Blueprint $table){
        $table->foreignIdFor(\App\Models\Ecole::class)->nullable()->constrained()->cascadeOnDelete(); 
   }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
        Schema::table('coup_de_projecteurs', function(Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Ecole::class);
        }); 
        Schema::table('programmes', function(Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Ecole::class);
        }); 
        
    }
};
