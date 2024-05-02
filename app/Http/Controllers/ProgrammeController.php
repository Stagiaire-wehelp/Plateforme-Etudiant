<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgrammeRequest;
use App\Models\DomaineEtude;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        try {
            $programmes = Programme::all();
            return response()->json($programmes);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors du chargement des programmes'], 500);
        }
    }

    /**
     * Stocke une nouvelle ressource.
     */
    public function creerProgramme(ProgrammeRequest $request)
    {
        try {
            $programme = Programme::create(
                $request->validated()
            );
    
            return response()->json(['message' => 'Programme créé avec succès', 'programme' => $programme], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du programme', 'error' => $e->getMessage()], 500);
        }
    }
    
    

    /**
     * Affiche la ressource spécifiée.
     */
    public function showProgramme($id)
    {
        $programme = Programme::find($id);
        if (!$programme) {
            return response()->json(['message' => 'Programme introuvable'], 404);
        }
        return response()->json($programme);
    }

    /**
     * Met à jour la ressource spécifiée.
     */
    public function updateProgramme(ProgrammeRequest $request, $id)
    {
        $programme = Programme::find($id);
        if (!$programme) {
            return response()->json(['message' => 'Programme introuvable'], 404);
        }
        try {
            $programme->update($request->validated());
            return response()->json(['message' => 'Programme mis à jour avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la mise à jour du programme'], 500);
        }
    }

    /**
     * Supprime la ressource spécifiée.
     */
    public function destroyProgramme($id)
    {
        $programme = Programme::find($id);
        if (!$programme) {
            return response()->json(['message' => 'Programme introuvable'], 404);
        }
        try {
            $programme->delete();
            return response()->json(['message' => 'Programme supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du programme'], 500);
        }
    }
    /**
 * Récupère les domaines qui contiennent des programmes.
 */
public function domainesParProgrammes($id)
{
    $programme = Programme::find($id);
    if (!$programme) {
        return response()->json(['error' => 'Programme introuvable'], 404);
    }

    $domaines = DomaineEtude::where('programme_id', $id)->get();

    return response()->json(['programme' => $programme, 'domaines' => $domaines]);
}

}
