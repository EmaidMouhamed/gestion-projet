<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignerRoleUserRequest extends FormRequest
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
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'user_ids.required' => 'Veuillez sélectionner au moins un utilisateur.',
            'user_ids.array' => 'Les utilisateurs sélectionnés doivent être sous forme de tableau.',
            'user_ids.*.exists' => 'Un ou plusieurs des utilisateurs sélectionnés n\'existent pas.',
            'role_id.required' => 'Veuillez sélectionner un rôle.',
            'role_id.exists' => 'Le rôle sélectionné n\'existe pas.',
        ];
    }
}
