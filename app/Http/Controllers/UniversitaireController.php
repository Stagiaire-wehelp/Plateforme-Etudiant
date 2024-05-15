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

         $formfield = $request->validate([
            'adresse' => 'required|string',
            'nom' => 'required|string',
            'site_web' => 'nullable',
            'type' => 'required|string',
            'tel' => 'required|string',
            'user_id' => 'required|exists:users,id',

        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('universitaire', 'public');
            $formfield['image'] = $imagePath;
        }

        $universitaire = Universitaire::create( $formfield);
        return response()->json(['message' => 'Universitaire créé avec succès', 'universitaire' => $universitaire], 201);

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


            $formfield = $request->validate([
                'adresse' => 'string',
                'nom' => 'string',
                'site_web' => 'nullable',
                'type' => 'string',
                'tel' => 'string',
                'user_id' => 'exists:users,id',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('universitaire', 'public');
                $formfield['image'] = $imagePath;
            }

            $universitaire->update($formfield);
            return response()->json(['message' => 'universitaire modifié avec succès']);

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
