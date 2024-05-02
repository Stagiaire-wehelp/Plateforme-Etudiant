<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnivesriteStatistiqueRequest;
use App\Models\UniversiteStatistique;
use Illuminate\Http\Request;

class UniversiteStatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $uni = UniversiteStatistique::all();
            return response()->json($uni);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des Statistique de univerite '], 500);
        }
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnivesriteStatistiqueRequest $request)
    {
        try {
            $uni = UniversiteStatistique::create($request->validated());
            
            return response()->json(['message' => 'statistisue de l univeriste créé avec succès', 'statistique' => $uni], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du statistisue de l univeriste'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $uni = UniversiteStatistique::find($id);
        if (!$uni) {
            return response()->json(['message' => 'statistisue de l univeriste'], 404);
        }
        return response()->json($uni);
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(UnivesriteStatistiqueRequest $request, $id)
    {
        $uni = UniversiteStatistique::find($id);
        if (!$uni) {
            return response()->json(['message' => 'Statistique introuvable'], 404);
        }
        try {
            $uni->update($request->validated());
            return response()->json(['message' => 'statistique de l universite modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du statistique de l universite'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $uni = UniversiteStatistique::find($id);
        if (!$uni) {
            return response()->json(['message' => 'statistique introuvable'], 404);
        }
        try {
            $uni->delete();
            return response()->json(['message' => 'statistique supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du statistique'], 500);
        }
    }
}
