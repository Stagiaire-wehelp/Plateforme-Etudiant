<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SousDomaineEtudeRequest;
use App\Models\SousDomaine;

class SousDomaineEtudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        try {
            $sous_domaines = SousDomaine::all();
            return response()->json($sous_domaines);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des sous domaines'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function creerSousDomaine(SousDomaineEtudeRequest $request)
    {
        try {
            $sous_domaine = SousDomaine::create($request->validated());
            return response()->json(['message' => 'Sous-domaine créé avec succès', 'sous_domaine' => $sous_domaine], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du sous-domaine'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showSousDomaine($id)
    {
        $sous_domaine = SousDomaine::find($id);
        if (!$sous_domaine) {
            return response()->json(['message' => 'Sous-domaine introuvable'], 404);
        }
        return response()->json($sous_domaine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSousDomaine(SousDomaineEtudeRequest $request, $id)
    {
        $sous_domaine = SousDomaine::find($id);
        if (!$sous_domaine) {
            return response()->json(['message' => 'Sous-domaine introuvable'], 404);
        }
        try {
            $sous_domaine->update($request->validated());
            return response()->json(['message' => 'Sous-domaine modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du sous-domaine'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySousDomaine($id)
    {
        $sous_domaine = SousDomaine::find($id);
        if (!$sous_domaine) {
            return response()->json(['message' => 'Sous-domaine introuvable'], 404);
        }
        try {
            $sous_domaine->delete();
            return response()->json(['message' => 'Sous-domaine supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du sous-domaine'], 500);
        }
    }
}
