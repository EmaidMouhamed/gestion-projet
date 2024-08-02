<?php

namespace App\Policies;

use App\Models\Tache;
use App\Models\User;

class TachePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('voir tache');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tache $tache): bool
    {
        return $user->hasPermissionTo('voir tache');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('créer tache');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tache $tache): bool
    {
        return $tache->sousTaches->contains($user) && $user->hasPermissionTo('modifier tache');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tache $tache): bool
    {
        return $tache->sousTaches->contains($user) && $user->hasPermissionTo('supprimer tache');
    }
}
