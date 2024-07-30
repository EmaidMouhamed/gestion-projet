<?php

namespace App\Models;

use App\Enums\Prioritee;
use App\Enums\Statut;
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
        'statut' => Statut::class,
        'prioritee' => Prioritee::class,
    ];

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
