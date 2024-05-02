<?php

namespace App\Services;

use App\Models\UniversiteStatistique;

use Illuminate\Support\Carbon;

class VisiteUniversiteService
{
    public function mettreAJourNombreVisites($id)
    {
        $aujourdhui = Carbon::today()->toDateString();

        // Recherchez si une entrée existe pour cette université et cette date
        $visite = UniversiteStatistique::where('universitaire_id', $id)
                                          ->where('date', $aujourdhui)
                                          ->first();

        if ($visite) {
            // Si une entrée existe, incrémentez le nombre de visites
            $visite->increment('nbr_visite');
        } else {
            // Sinon, créez une nouvelle entrée avec un seul visite
            UniversiteStatistique::create([
                'universitaire_id' => $id,
                'date' => $aujourdhui,
                'nbr_visite' => 1,
            ]);
        }
    }
}
