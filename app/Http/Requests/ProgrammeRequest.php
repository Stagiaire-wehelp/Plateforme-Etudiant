<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgrammeRequest extends FormRequest
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
            
                'emplacement_geographique' => ['required', 'string', 'max:255'],
                'langue_enseignement' => ['required', 'string', 'max:255'],
                'niveau_etude' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'possibilite_financement' => ['required', 'string', 'max:255'],
                'duree' => ['required', 'integer', 'min:1'], // La durée doit être un entier positif
                'frais_scolarite' => ['required', 'numeric', 'min:0'], // Les frais de scolarité doivent être un nombre positif ou nul
                'ecole_id' => [ 'required','exists:ecoles,id'],
                
            
        ];
    }
}
