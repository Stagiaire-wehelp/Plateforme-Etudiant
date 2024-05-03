<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvenementRequest;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {   
        try {
            $evenements = Evenement::all();
            return response()->json($evenements);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des evenements'], 500);
        }
    }

    public function creerEvenement(EvenementRequest $request)
    {
        try {
            $evenement = Evenement::create($request->validated());
            return response()->json(['message' => 'Evenement créé avec succès', 'evenement' => $evenement], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du Evenement'], 500);
        }
    }

    public function showEvenement($id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'Evenement introuvable'], 404);
        }
        return response()->json($evenement);
    }

    public function updateEvenement(EvenementRequest $request, $id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'evenement introuvable'], 404);
        }
        try {
            $evenement->update($request->validated());
            return response()->json(['message' => 'evenement modifié avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification du evenement'], 500);
        }
    }

    public function destroyEvenement($id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'evenement introuvable'], 404);
        }
        try {
            $evenement->delete();
            return response()->json(['message' => 'evenement supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du evenement'], 500);
        }
    }
}
