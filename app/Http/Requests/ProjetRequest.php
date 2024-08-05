<?php

namespace App\Http\Requests;

use App\Enums\Statut;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nom' => [
                'required', 'string',
                Rule::unique('projets')->ignore($this->route('projet'))
            ],
            'description' => ['required', 'string', 'min:10'],
            'statut' => ['required', 'in:' . implode(',', Statut::getValues())],
            'date_debut' => ['required', 'date', 'after:' . Carbon::now()->format('Y-m-d')],
            'date_fin' => ['required', 'date', 'after:date_debut'],
            'budget' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.unique' => 'Ce nom de projet existe déjà.',
            'nom.max' => 'Le champ nom ne peut pas dépasser 50 caractères.',
            'description.min' => 'Le champ description doit avoir au minimum 10 caractère.',
            'statut.required' => 'Le champ statut est obligatoire.',
            'date_debut.required' => 'Le champ date de début est obligatoire.',
            'date_debut.date' => 'Le champ date de début doit être une date valide.',
            'date_debut.after' => 'Le champ date de début doit être une date postérieure à la date actuelle.',
            'date_fin.required' => 'Le champ date de fin est obligatoire.',
            'date_fin.date' => 'Le champ date de fin doit être une date valide.',
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
            'budget.numeric' => 'Le champ budget doit être un nombre.',
            'budget.min' => 'Le champ budget doit être supérieur ou égal à 0.',
        ];
    }
}
