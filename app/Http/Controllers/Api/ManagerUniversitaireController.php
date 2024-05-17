<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ManagerUniversitaire;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerUniversitaireController extends Controller
{


    public function universitesUtilisateur(User $manager)
    {
        $universites = $manager->managerUniversitaires->pluck('universitaire');

        return response()->json($universites);
    }



    public function insererRelations(Request $request, $managerId)
    {
        $user = User::findOrFail($managerId);
        $universiteIds = $request->input('universiteIds', []);

        foreach ($universiteIds as $universiteId) {
            ManagerUniversitaire::create([
                'user_id' => $managerId,
                'universitaire_id' => $universiteId,
            ]);
        }
        return response()->json(['message' => 'Relations insérées avec succès']);
    }



    public function supprimerRelation($managerid, $universiteId)
    {
        $relation = ManagerUniversitaire::where('user_id', $managerid)
                                        ->where('universitaire_id', $universiteId)
                                        ->firstOrFail();

        $relation->delete();
        return response()->json(['message' => 'Relation supprimée avec succès']);
    }

    

    public function supprimerRelationsMultiple(Request $request, $manager)
    {
        $universiteIds = $request->input('universiteIds', []);

        ManagerUniversitaire::where('user_id', $manager)
                            ->whereIn('universitaire_id', $universiteIds)
                            ->delete();

        return response()->json(['message' => 'Relations supprimées avec succès']);
    }
}
