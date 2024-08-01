<?php

namespace App\Policies;

use App\Models\Projet;
use App\Models\User;

class ProjetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_projet');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Projet $projet): bool
    {
        return $user->hasPermissionTo('view_projet');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_projet');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Projet $projet): bool
    {
        return $projet->user()->is($user) && $user->hasPermissionTo('update_projet');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Projet $projet): bool
    {
        return $projet->user()->is($user) && $user->hasPermissionTo('delete_projet');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Projet $projet): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Projet $projet): bool
    // {
    //     //
    // }
}
