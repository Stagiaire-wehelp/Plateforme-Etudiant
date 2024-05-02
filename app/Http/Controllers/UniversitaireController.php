<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversitaireRequest;
use App\Models\Ecole;
use App\Models\Evenement;
use App\Models\Offre;
use App\Models\Universitaire;
use App\Models\UniversiteStatistique;
use Illuminate\Http\Request;

class UniversitaireController extends Controller
{
    public function index()
    {   
        try {
            $universitaires = Universitaire::all();
            return response()->json($universitaires);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des Universitaires'], 500);
        }
    }

    public function creerUniversitaire(UniversitaireRequest $request)
    {
        try {
            $universitaires = Universitaire::create($request->validated());
            return response()->json(['message' => 'Universitaire créé avec succès', 'universitaire' => $universitaires], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du universitaire'], 500);
        }
    }

    public function showUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['message' => 'Universitaire introuvable'], 404);
        }
        return response()->json($universitaire);
    }

    public function updateUniversitaire(UniversitaireRequest $request, $id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['message' => 'universitaire introuvable'], 404);
        }
        try {
            $universitaire->update($request->validated());
            return response()->json(['message' => 'universitaire modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du universitaire'], 500);
        }
    }

    public function destroyUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['message' => 'universitaire introuvable'], 404);
        }
        try {
            $universitaire->delete();
            return response()->json(['message' => 'universitaire supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du universitaire'], 500);
        }
    }

    public function ecolesparUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['error' => 'universitaire introuvable'], 404);
        }

        $ecoles = Ecole::where('universitaire_id', $id)->get();

        return response()->json(['universitaire' => $universitaire, 'ecoles' => $ecoles]);
    }

    public function evenementsparUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['error' => 'universitaire introuvable'], 404);
        }

        $evenement = Evenement::where('universitaire_id', $id)->get();

        return response()->json(['universitaire' => $universitaire, 'evenements' => $evenement]);
    }

    public function offresparUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['error' => 'universitaire introuvable'], 404);
        }

        $offre = Offre::where('universitaire_id', $id)->get();

        return response()->json(['universitaire' => $universitaire, 'offres' => $offre]);
    }

    public function offres_filtre($id, $type){
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['error' => 'universitaire introuvable'], 404);
        }

        $offre = Offre::where('universitaire_id', $id)->where('type_offre', $type)->get();
        return response()->json(['universitaire' => $universitaire, 'offres' => $offre]);
       
    }

    public function statistiqueUniversitaire($id)
    {
        $universitaire = Universitaire::find($id);
        if (!$universitaire) {
            return response()->json(['error' => 'universitaire introuvable'], 404);
        }

        $uni = UniversiteStatistique::where('universitaire_id', $id)->get();

        return response()->json(['universitaire' => $universitaire, 'statistique' => $uni]);
    }

}
