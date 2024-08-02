<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:50',
                Rule::unique('roles')->ignore($this->route('role'))
            ],
            'description' => 'nullable',
            'user_ids' => 'nullable',
            'user_ids.*' => 'exists:users,id',
            'permissions' => ['required', 'min:1'],
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.unique' => 'Ce nom de rôle est déjà utilisé.',
            'nom.max' => 'Le nom ne doit pas dépasser 50 caractères.',
            'user_ids.*.exists' => 'Un ou plusieurs utilisateurs sélectionnés sont invalides.',
            'permissions.required' => 'Veuillez sélectionner au moins une permission.',
            'permissions.*.exists' => 'Une ou plusieurs permissions sélectionnées sont invalides.',
            'permissions.min' => 'Veuillez sélectionner au moins une permission.',
        ];
    }
}
