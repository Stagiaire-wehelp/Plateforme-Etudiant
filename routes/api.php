<?php

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
