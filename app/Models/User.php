<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projets(): HasMany
    {
        return $this->hasMany(Projet::class);
    }

    public function taches(): BelongsToMany
    {
        return $this->belongsToMany(Tache::class);
    }

    public function sousTaches(): BelongsToMany
    {
        return $this->belongsToMany(SousTache::class);
    }

    public function hasPermissionTo($permission): bool
    {
        // Vérifie si l'utilisateur possède des rôles qui ont la permission spécifiée
        return $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            // Filtre les rôles pour ceux qui ont la permission spécifiée
            $query->where('name', $permission);
        })->exists(); // Vérifie l'existence de ces rôles avec la permission
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdministrator(): bool
    {
        // Vérifie si l'utilisateur possède un rôle nommé 'Administrateur'
        return $this->roles()->where('nom', 'Administrateur')->exists(); // Vérifie l'existence de ce rôle
    }
}
