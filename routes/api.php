<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\Api\AnnonceController;
use App\Http\Controllers\Api\CandidatureController;
use App\Http\Controllers\Api\CommentaireController;
use App\Http\Controllers\Api\ForumDiscussionController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PaysController;
use App\Http\Controllers\Api\VilleController;
use App\Models\Annonce;
use App\Models\User;
use App\Http\Controllers\CoupProjecteurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\DomaineEtudeController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\SousDomaineEtudeController;
use App\Http\Controllers\UniversitaireController;
use App\Http\Controllers\UniversiteStatistiqueController;
use App\Models\DomaineEtude;
use App\Models\Programme;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['auth:api'])->group(function () {
        Route::get('/universitaires', [UniversitaireController::class, 'index']);
        Route::post('/universitaires', [UniversitaireController::class, 'creerUniversitaire']);
        Route::get('/universitaires/{id}', [UniversitaireController::class, 'showUniversitaire'])->middleware('update.visite.universite');
        Route::put('/universitaires/{id}', [UniversitaireController::class, 'updateUniversitaire']);
        Route::delete('/universitaires/{id}', [UniversitaireController::class, 'destroyUniversitaire']);
        Route::get('universitaires/{id}/ecoles', [UniversitaireController::class, 'ecolesparUniversitaire']);
        Route::get('universitaires/{id}/evenements', [UniversitaireController::class, 'evenementsparUniversitaire']);
        Route::get('universitaires/{id}/offres', [UniversitaireController::class, 'offresparUniversitaire']);
        Route::get('universitaires/{id}/offres/{type}', [UniversitaireController::class, 'offres_filtre']);
        Route::get('universitaires/{id}/statistiques', [UniversitaireController::class, 'statistiqueUniversitaire']);



        Route::get('/evenements', [EvenementController::class, 'index']);
        Route::post('/evenements', [EvenementController::class, 'creerEvenement']);
        Route::get('/evenements/{id}', [EvenementController::class, 'showEvenement']);
        Route::put('/evenements/{id}', [EvenementController::class, 'updateEvenement']);
        Route::delete('/evenements/{id}', [EvenementController::class, 'destroyEvenement']);

        Route::get('/ecoles', [EcoleController::class, 'index']);
        Route::post('/ecoles', [EcoleController::class, 'creerEcole']);
        Route::get('/ecoles/{id}', [EcoleController::class, 'showEcole']);
        Route::put('/ecoles/{id}', [EcoleController::class, 'updateEcole']);
        Route::delete('/ecoles/{id}', [EcoleController::class, 'destroyEcole']);
        Route::get('ecoles/{id}/programmes', [EcoleController::class, 'programmesParEcole']);

        Route::get('/programmes', [ProgrammeController::class, 'index']);
        Route::post('/programmes', [ProgrammeController::class, 'creerProgramme']);
        Route::get('/programmes/{id}', [ProgrammeController::class, 'showProgramme']);
        Route::put('/programmes/{id}', [ProgrammeController::class, 'updateProgramme']);
        Route::delete('/programmes/{id}', [ProgrammeController::class, 'destroyProgramme']);
        Route::get('programmes/{id}/domaines', [ProgrammeController::class, 'domainesParProgrammes']);

        Route::get('/domaineEtudes', [DomaineEtudeController::class, 'index']);
        Route::post('/domaineEtudes', [DomaineEtudeController::class, 'creerDomaine']);
        Route::get('/domaineEtudes/{id}', [DomaineEtudeController::class, 'showDomaine']);
        Route::put('/domaineEtudes/{id}', [DomaineEtudeController::class, 'updateDomaine']);
        Route::delete('/domaineEtudes/{id}', [DomaineEtudeController::class, 'destroyDomaine']);
        Route::get('domaineEtudes/{id}/sousDomaines', [DomaineEtudeController::class, 'sousDomaineParDomaine']);


        Route::get('/sousDomaines', [SousDomaineEtudeController::class, 'index']);
        Route::post('/sousDomaines', [SousDomaineEtudeController::class, 'creerSousDomaine']);
        Route::get('/sousDomaines/{id}', [SousDomaineEtudeController::class, 'showSousDomaine']);
        Route::put('/sousDomaines/{id}', [SousDomaineEtudeController::class, 'updateSousDomaine']);
        Route::delete('/sousDomaines/{id}', [SousDomaineEtudeController::class, 'destroySousDomaine']);


        Route::get('/coupProjecteurs', [CoupProjecteurController::class, 'index']);
        Route::post('/coupProjecteurs', [CoupProjecteurController::class, 'creerCoupProjecteur']);
        Route::get('/coupProjecteurs/{id}', [CoupProjecteurController::class, 'showCoupProjecteur']);
        Route::put('/coupProjecteurs/{id}', [CoupProjecteurController::class, 'updateCoupProjecteur']);
        Route::delete('/coupProjecteurs/{id}', [CoupProjecteurController::class, 'destroyCoupProjecteur']);

        Route::resource('offres',OffreController::class)->except(['edit','create']);
        Route::resource('universiteStatistique',UniversiteStatistiqueController::class)->except(['edit','create']);







        //Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/accounts', [AccountController::class,'index']);
        Route::get('/accounts/{account}', [AccountController::class,'show']);
        Route::post('/accounts', [AccountController::class,'store']);
        Route::put('/accounts/{account}', [AccountController::class,'update']);
        Route::delete('/accounts/{account}', [AccountController::class,'delete']);

        Route::get('/accounts/managers/{account}', [AccountController::class,'allUniversitaire']);

        Route::get('/annonces', [AnnonceController::class,'index']);
        Route::get('/annonces/{annonce}', [AnnonceController::class,'show']);
        Route::post('/annonces', [AnnonceController::class,'store']);
        Route::put('/annonces/{annonce}', [AnnonceController::class,'update']);
        Route::delete('/annonces/{annonce}', [AnnonceController::class,'delete']);

        Route::get('/candidatures', [CandidatureController::class,'index']);
        Route::get('/candidatures/{candidature}', [CandidatureController::class,'show']);
        Route::post('/candidatures', [CandidatureController::class,'store']);
        Route::put('/candidatures/{candidature}', [CandidatureController::class,'update']);
        Route::delete('/candidatures/{candidature}', [CandidatureController::class,'delete']);


        Route::get('/pays', [PaysController::class,'index']);
        Route::get('/pays/{pays}', [PaysController::class,'show']);
        Route::post('/pays', [PaysController::class,'store']);
        Route::put('/pays/{pays}', [PaysController::class,'update']);
        Route::delete('/pays/{pays}', [PaysController::class,'delete']);

        Route::get('/allvillespays/{pays}', [PaysController::class,'allPaysVilles']);//tous les villes d'une pays



        Route::get('/villes', [VilleController::class,'index']);
        Route::get('/villes/{ville}', [VilleController::class,'show']);
        Route::post('/villes', [VilleController::class,'store']);
        Route::put('/villes/{ville}', [VilleController::class,'update']);
        Route::delete('/villes/{ville}', [VilleController::class,'delete']);


        Route::get('/messages/{user}', [MessageController::class,'show']);
        Route::post('/messages/{user}', [MessageController::class,'store']);


        Route::get('/forum_discussion', [ForumDiscussionController::class,'index']);
        Route::post('/forum_discussion', [ForumDiscussionController::class,'store']);
        Route::put('/forum_discussion/{forum}', [ForumDiscussionController::class,'update']);
        Route::delete('/forum_discussion/{forum}', [ForumDiscussionController::class,'delete']);

        Route::get('/forum_discussion_universitaire/{universitaire}', [ForumDiscussionController::class,'allforumUniversity']);
        Route::get('/forum_discussion_commantaire/{forum}', [ForumDiscussionController::class,'allforumcommantaire']);



        Route::post('/commantaire', [CommentaireController::class,'store']);
        Route::put('/commantaire/{commentaire}', [CommentaireController::class,'update']);
        Route::delete('/commantaire/{commentaire}', [CommentaireController::class,'delete']);



        //Route::middleware(['auth:api', 'role:etudiant,administrateur'])->get('/etudiantsE', [RegisterController::class, 'getAllUsers'])

            // Vos routes protégées par le middleware
});
