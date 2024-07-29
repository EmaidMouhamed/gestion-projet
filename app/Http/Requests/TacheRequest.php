<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TacheRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'description' => ['required'],
            'statut' => ['required'],
            'prioritee' => ['required'],
            'date_limite' => ['required', 'date'],
            'projet_id' => ['required', 'exists:projets,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
