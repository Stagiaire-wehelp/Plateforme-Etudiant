<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string', // La description est requise et doit être une chaîne de caractères
            'entreprise' => 'required|string', // Le nom de l'entreprise est requis et doit être une chaîne de caractères
            'lieu' => 'required|string', // Le lieu est requis et doit être une chaîne de caractères
            'statue' => 'required|string', // Le statut est requis et doit être une chaîne de caractères
            'titre' => 'required|string', // Le titre est requis et doit être une chaîne de caractères
            'type_offre' => 'required|in:stage,offre_emploi', // Le type d'offre est requis et doit être soit 'stage' soit 'offre_emploi'
            'universitaire_id' => 'required|exists:universitaires,id', // L'ID universitaire est requis et doit exister dans la table 'universitaires'
            'nbr_places' => 'required|integer|min:1', // Le nombre de places est requis, doit être un entier et doit être au moins égal à 1
            'salaire' => 'nullable|numeric|min:0', // Le salaire est optionnel, mais s'il est renseigné, il doit être numérique et supérieur ou égal à 0
        ];
    }
}
