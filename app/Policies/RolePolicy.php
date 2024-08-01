<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any roles.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_role');
    }

    /**
     * Determine whether the user can view the role.
     */
    public function view(User $user, Role $role)
    {
        return $user->hasPermissionTo('view_role');
    }

    /**
     * Determine whether the user can create roles.
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_role');
    }

    /**
     * Determine whether the user can update the role.
     */
    public function update(User $user, Role $role)
    {
        return $user->hasPermissionTo('edit_role');
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasPermissionTo('delete_role');
    }
}
