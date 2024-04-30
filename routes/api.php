<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\Api\AnnonceController;
use App\Http\Controllers\Api\CandidatureController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
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
