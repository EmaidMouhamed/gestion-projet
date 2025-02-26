<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    //    use HasFactory;

    protected $fillable = [
        'nom', 'description', 'etat'
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function isAssignedToUsers(): bool
    {
        return $this->users()->exists();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
