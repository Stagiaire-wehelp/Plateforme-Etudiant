<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoupProjecteurRequest;
use App\Models\CoupDeProjecteur;
use App\Models\Ecole;

class CoupProjecteurController extends Controller
{
   

    public function creerCoupProjecteur(CoupProjecteurRequest $request)
    {
        try {
            $coupProjecteur = CoupDeProjecteur::create($request->validated());
            return response()->json(['message' => 'Coup de projecteur créé avec succès', 'coupProjecteur' => $coupProjecteur], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du coup de projecteur'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCoupProjecteur(CoupProjecteurRequest $request, $id)
    {
        $coupProjecteur = CoupDeProjecteur::find($id);
        if (!$coupProjecteur) {
            return response()->json(['error' => 'Coup de projecteur non trouvé'], 404);
        }
        try {
            $coupProjecteur->update($request->validated());
            return response()->json(['message' => 'Coup de projecteur mis à jour avec succès']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour du coup de projecteur'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupProjecteurs = CoupDeProjecteur::join('ecoles', 'coup_de_projecteurs.ecole_id', '=', 'ecoles.id')
    ->select('coup_de_projecteurs.*', 'ecoles.title as ecole_title')
    ->get();

return response()->json($coupProjecteurs);

        

        
    }

    /**
     * Show the specified resource.
     */
    public function showCoupProjecteur($id)
    {
        try {
            $coupProjecteur = CoupDeProjecteur::with('ecole')->find($id); // Charger la relation Ecole
            if (!$coupProjecteur) {
                return response()->json(['error' => 'Coup de projecteur non trouvé'], 404);
            }
            $nomEcole = $coupProjecteur->ecole->title; // Récupérer le nom de l'école
            $coupProjecteur->setAttribute('nom_ecole', $nomEcole); // Ajouter le nom de l'école à l'objet coupProjecteur
            return response()->json($coupProjecteur);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la récupération du coup de projecteur'], 500);
        }
    }

    public function destroyCoupProjecteur($id)
    {
        try {
            $coupProjecteur = CoupDeProjecteur::findOrFail($id);
            $coupProjecteur->delete();
            return response()->json(['message' => 'Coup de projecteur supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la suppression du coup de projecteur'], 500);
        }
    }
}
