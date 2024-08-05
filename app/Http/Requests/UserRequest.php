<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TacheRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string',
                Rule::unique('users')->ignore($this->route('user'))
            ],
            'firstname' => ['required', 'string'],
            'tel' => ['nullable'],
            'email' => ['required'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
            'image' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le champ nom est requis.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.unique' => 'Le nom choisi est déjà utilisé.',
            'firstname.required' => 'Le champ prénom est requis.',
            'firstname.string' => 'Le champ prénom doit être une chaîne de caractères.',
            'email.required' => 'Le champ email est requis.',
            'password.required' => 'Le champ mot de passe est requis.',
            'confirm_password.required' => 'Veuillez confirmer le mot de passe saisit',
            'confirm_password.same' => 'Les mos de passe doivent être identiques',
        ];
    }
}
