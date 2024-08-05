<?php

namespace App\Policies;

use App\Models\SousTache;
use App\Models\User;

class SousTachePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('voir sous tache');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SousTache $sousTache): bool
    {
        return $user->hasPermissionTo('voir sous tache');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('créer sous tache');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SousTache $sousTache): bool
    {
        return $sousTache->users->contains($user) && $user->hasPermissionTo('modifier sous tache');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SousTache $sousTache): bool
    {
        return $sousTache->users->contains($user) && $user->hasPermissionTo('supprimer sous tache');
    }
}
