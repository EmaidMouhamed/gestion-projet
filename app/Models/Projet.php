<?php

namespace App\Models;

use App\Enums\Statut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projet extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'statut',
        'user_id',
    ];

    protected $casts = [
        'statut' => Statut::class,
        'date_debut' => 'date',
        'date_fin' => 'date'
    ];

    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
