<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'date_limite' => ['required', 'date', 'after:' . Carbon::now()->format('Y-m-d')],
            'projet_id' => ['required', 'exists:projets,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
    public function messages()
{
    return [
        'nom.required' => 'Le champ nom est requis.',
        'description.required' => 'Le champ description est requis.',
        'statut.required' => 'Le champ statut est requis.',
        'prioritee.required' => 'Le champ prioritee est requis.',
        'date_limite.required' => 'Le champ date limite est requis.',
        'date_limite.date' => 'Le champ date limite doit être une date valide.',
        'date_limite.after' => 'Le champ date limite doit être une date postérieure à la date actuelle.',
        'projet_id.required' => 'Le champ projet_id est requis.',
        'projet_id.exists' => 'Le projet sélectionné n\'existe pas.',
    ];
}
}
