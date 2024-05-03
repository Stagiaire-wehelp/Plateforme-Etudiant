<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DomaineEtudeRequest;
use App\Models\DomaineEtude;
use App\Models\SousDomaine;

class DomaineEtudeController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        try {
            $domaine_etudes = DomaineEtude::all(); // Charger la relation SousDomaine
            return response()->json($domaine_etudes);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des domaines d\'étude'], 500);
        }
    }

    /**
     * Stocke une nouvelle ressource.
     */
    public function creerDomaine(DomaineEtudeRequest $request)
    {
        try {
            $domaine_etude = DomaineEtude::create($request->validated());
            return response()->json(['message' => 'Domaine créé avec succès', 'domaine_etudes' => $domaine_etude], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du domaine'], 500);
        }
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function showDomaine($id)
    {
        $domaine_etude = DomaineEtude::with('sousDomaine')->find($id); // Charger la relation SousDomaine
        if (!$domaine_etude) {
            return response()->json(['message' => 'Domaine non trouvé'], 404);
        }
        return response()->json($domaine_etude);
    }

    /**
     * Met à jour la ressource spécifiée.
     */
    public function updateDomaine(DomaineEtudeRequest $request, $id)
    {
        $domaine_etude = DomaineEtude::find($id);
        if (!$domaine_etude) {
            return response()->json(['message' => 'Domaine non trouvé'], 404);
        }
        try {
            $domaine_etude->update($request->validated());
            return response()->json(['message' => 'Domaine modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du domaine'], 500);
        }
    }

    /**
     * Supprime la ressource spécifiée.
     */
    public function destroyDomaine($id)
    {
        $domaine_etude = DomaineEtude::find($id);
        if (!$domaine_etude) {
            return response()->json(['message' => 'Domaine non trouvé'], 404);
        }
        try {
            $domaine_etude->delete();
            return response()->json(['message' => 'Domaine supprimé avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du domaine'], 500);
        }
    }
    public function sousDomaineParDomaine($id)
{
    $domaine = DomaineEtude::find($id);
    if (!$domaine) {
        return response()->json(['error' => 'Domaine introuvable'], 404);
    }

    $sous_domaines = SousDomaine::where('domaine_etude_id', $id)->get();

    return response()->json(['domaine' => $domaine, 'sous_domaines' => $sous_domaines]);
}
}
