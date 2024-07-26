<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projet extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'statut',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
