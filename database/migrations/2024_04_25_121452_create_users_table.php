<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Ajouter l'identifiant primaire de l'utilisateur
            $table->id();

            // Ajouter le nom de l'utilisateur
            $table->string('nom');

            $table->string('prenom');

            // Ajouter l'email de l'utilisateur avec contrainte unique
            $table->string('email')->unique();

            // Ajouter le timestamp pour la vérification de l'email, nullable
            $table->timestamp('email_verified_at')->nullable();

            // Ajouter le mot de passe de l'utilisateur
            $table->string('password');

            // Ajouter le remember token de l'utilisateur
            $table->rememberToken();


            $table->string('tel');

            // Ajouter le champ 'role' avec une énumération
            $table->enum('role', ['administrateur', 'etudiant', 'annonceur', 'responsable_universitaire', 'manager'])->default('etudiant');


            $table->string('nom_Organization')->nullable();
            $table->enum('level',['Bac','Bac+2','Bac+3','Bac+4','Bac+5'])->nullable();
            $table->date('Date_Graduation')->nullable();

            // Ajouter les timestamps pour la gestion de la création et de la mise à jour
            $table->timestamps();

            // Ajouter la colonne pour la gestion des suppressions logiques
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
