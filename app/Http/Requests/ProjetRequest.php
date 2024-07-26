<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'nom' => ['required', 'string', 'unique:projets,nom'],
            'description' => ['nullable', 'string'],
            'statut' => 'required',
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after:date_debut'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.unique' => 'Ce nom de rôle existe déjà.',
            'nom.max' => 'Le champ nom ne peut pas dépasser 50 caractères.',
            'description.text' => 'Le champ description doit être du type texte.',
            'statut.required' => 'Le champ statut est obligatoire.',
            'date_debut.required' => 'Le champ date de début est obligatoire.',
            'date_debut.date' => 'Le champ date de début doit être une date valide.',
            'date_fin.required' => 'Le champ date de fin est obligatoire.',
            'date_fin.date' => 'Le champ date de fin doit être une date valide.',
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.'
        ];
    }
}
