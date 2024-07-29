<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tache extends Model
{

    protected $fillable = [
        'nom',
        'description',
        'statut',
        'prioritee',
        'date_limite',
        'projet_id'
    ];

    protected $casts = [
        'date_limite' => 'date',
    ];

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
}
