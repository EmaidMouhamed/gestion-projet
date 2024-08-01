<?php

namespace App\Models;

use App\Enums\Prioritee;
use App\Enums\Statut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SousTache extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'statut',
        'prioritee',
        'date_limite',
        'tache_id'
    ];

    protected $casts = [
        'date_limite' => 'date',
        'statut' => Statut::class,
        'prioritee' => Prioritee::class,
    ];

    public function tache(): BelongsTo
    {
        return $this->belongsTo(Tache::class);
    }   
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
