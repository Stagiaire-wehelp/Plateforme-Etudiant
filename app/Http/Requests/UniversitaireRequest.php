<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversitaireRequest extends FormRequest
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
            'adresse'=>['required', 'string', 'max:255'],
            'nom'=>['required', 'string', 'max:255'],
            'site_web'=>['required', 'string', 'max:255'],
            'type'=>['required', 'string', 'max:255'],
            'tel'=>['required', 'string', 'max:255'],
        ];
    }
}
