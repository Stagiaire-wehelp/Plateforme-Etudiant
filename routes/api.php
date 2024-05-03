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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
//Route::post('/register', [RegisterController::class, 'register']);

Route::get('/accounts', [AccountController::class,'index']);
Route::get('/accounts/{account}', [AccountController::class,'show']);
Route::post('/accounts', [AccountController::class,'store']);
Route::put('/accounts/{account}', [AccountController::class,'update']);
Route::delete('/accounts/{account}', [AccountController::class,'delete']);

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

Route::get('/forum_discussion_commantaire/{forum}', [ForumDiscussionController::class,'allforumcommantaire']);



Route::post('/commantaire', [CommentaireController::class,'store']);
Route::put('/commantaire/{commentaire}', [CommentaireController::class,'update']);
Route::delete('/commantaire/{commentaire}', [CommentaireController::class,'delete']);



//Route::middleware(['auth:api', 'role:etudiant,administrateur'])->get('/etudiantsE', [RegisterController::class, 'getAllUsers'])
