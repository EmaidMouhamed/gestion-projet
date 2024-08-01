<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignerRoleUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AssignerRoleUserController extends Controller
{
    public function index(): View
    {
        $users = User::with('role')
            ->where('id', '!=', auth()->user()->id)
            ->get();
        return view('admin.assigner_role_user.index', compact('users'));
    }

    public function create(): View
    {
        $users = User::with('role')
            ->where('id', '!=', auth()->user()->id)
            ->whereNull('role_id')
            ->get();
        $roles = Role::all();
        return view('admin.assigner_role_user.add', compact('users', 'roles'));
    }

    public function store(AssignerRoleUserRequest $request): RedirectResponse
    {
        $roleId = $request->role_id;
        $userIds = $request->user_ids;

        User::whereIn('id', $userIds)->update(['role_id' => $roleId]);

        return to_route('assigner_role_user.index')->with('success', 'Rôle attribué avec succès.');
    }

    public function update(AssignerRoleUserRequest $request, $id): RedirectResponse
    {
        $roleId = $request->role_id;
        $userIds = $request->user_ids;

        User::whereIn('id', $userIds)->update(['role_id' => $roleId]);

        return to_route('assigner_role_user.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.assigner_role_user.edit', compact('user', 'roles'));
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->role_id = null;
        $user->save();

        return to_route('assigner_role_user.index')->with('success', 'Rôle retiré avec succès.');
    }
}
