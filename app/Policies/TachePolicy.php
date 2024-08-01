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
        return $tache->users->contains($user->id) && $user->hasPermissionTo('modifier tache');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tache $tache): bool
    {
        return $tache->users->contains($user->id) && $user->hasPermissionTo('supprimer tache');
    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Tache $tache): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, Tache $tache): bool
//    {
//        //
//    }
}
