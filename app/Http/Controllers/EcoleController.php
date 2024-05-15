<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\EcoleRequest;
use App\Models\Ecole;
use App\Models\Programme;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ecoles = Ecole::all();
            return response()->json($ecoles);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des écoles'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creerEcole(EcoleRequest $request)
{
    try {
        $formfield = $request->validated();

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('ecole', 'public');
            $formfield['image'] = $imagePath;
        }
        $ecole = Ecole::create($formfield);
        return response()->json(['message' => 'Ecole créée avec succès', 'ecole' => $ecole], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erreur lors de la création de l\'école'], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function showEcole($id)
    {
        $ecole = Ecole::find($id);
        if (!$ecole) {
            return response()->json(['error' => 'Ecole introuvable'], 404);
        }
        return response()->json($ecole);
    }

    /**
     * Update the specified resource in storage.
     */

public function updateEcole(EcoleRequest $request,$id)
{
    $ecole = Ecole::find($id);
    if (!$ecole) {
        return response()->json(['error' => 'Ecole introuvable'], 404);
    }
    try {

        $formfield = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ecole', 'public');
            $formfield['image'] = $imagePath;
        }
        $ecole->update($formfield);
        return response()->json(['message' => 'Ecole mise à jour avec succès']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la mise à jour de l\'école'], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroyEcole($id)
    {
        try {
            $ecole = Ecole::findOrFail($id);
            $ecole->delete();
            return response()->json(['message' => 'Ecole supprimée avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur interne du serveur'], 500);
        }
    }
    public function programmesParEcole($id)
    {
        $ecole = Ecole::find($id);
        if (!$ecole) {
            return response()->json(['error' => 'Ecole introuvable'], 404);
        }

        $programmes = Programme::where('ecole_id', $id)->get();

        return response()->json(['ecole' => $ecole, 'programmes' => $programmes]);
    }
}
