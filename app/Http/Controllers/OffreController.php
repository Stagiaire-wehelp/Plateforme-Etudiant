<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $offres = Offre::all();
            return response()->json($offres);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des Offres'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(OffreRequest $request)
    {
        try {
            $offre = Offre::create($request->validated());
            
            return response()->json(['message' => 'offre créé avec succès', 'offre' => $offre], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du offre'], 500);
        }
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offre = Offre::find($id);
        if (!$offre) {
            return response()->json(['message' => 'offre introuvable'], 404);
        }
        return response()->json($offre);
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(OffreRequest $request, $id)
    {
        $offre = Offre::find($id);
        if (!$offre) {
            return response()->json(['message' => 'offre introuvable'], 404);
        }
        try {
            $offre->update($request->validated());
            return response()->json(['message' => 'offre modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du offre'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $offre = Offre::find($id);
        if (!$offre) {
            return response()->json(['message' => 'offre introuvable'], 404);
        }
        try {
            $offre->delete();
            return response()->json(['message' => 'offre supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression d offre'], 500);
        }
    }
}
