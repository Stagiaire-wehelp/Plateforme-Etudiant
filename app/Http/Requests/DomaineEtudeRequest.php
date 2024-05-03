<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomaineEtudeRequest extends FormRequest
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
            'nom'=>['required','min:4'],
            'description'=>['required','min:10'],
            'programme_id' => ['required','exists:programmes,id'],// Assurez-vous que le programme_id existe dans la table des programmes
            
        ];
    }
}
