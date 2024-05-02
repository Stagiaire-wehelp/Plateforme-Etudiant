<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SousDomaineEtudeRequest extends FormRequest
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
           
                'description' => ['required', 'string'], // La description peut être null ou une chaîne de caractères
                'nom' => ['required', 'string','min:2', 'max:255'], // Le nom est obligatoire et ne doit pas dépasser 255 caractères
                'domaine_etude_id' => ['required','exists:domaine_etudes,id']
                
            
        ];
    }
}
