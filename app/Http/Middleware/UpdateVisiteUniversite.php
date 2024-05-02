<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\VisiteUniversiteService;

class UpdateVisiteUniversite
{
    protected $visiteService;

    public function __construct(VisiteUniversiteService $visiteService)
    {
        $this->visiteService = $visiteService;
    }

    public function handle($request, Closure $next)
    {
        // Récupérer l'ID de l'université visitée depuis la requête
        $universiteId = $request->route('id');

        // Appeler la méthode du service pour mettre à jour le nombre de visites
        $this->visiteService->mettreAJourNombreVisites($universiteId);

        // Poursuivre le traitement de la requête
        return $next($request);
    }
}
