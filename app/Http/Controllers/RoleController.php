<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //on récupère les différents clients dans notre model role
        //en préchargent les permissions pour éviter le "eager loading" (N + 1)
        $roles = Role::with('permissions')
            ->whereNot('nom', 'Administrateur')
            ->paginate(10);

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        // Créer le rôle
        $role = Role::create([
            'nom' => $request->validated('nom'),
            'description' => $request->validated('description'),
        ]);

        // Synchroniser les permissions
        $role->permissions()->sync($request->validated('permissions'));

        // Synchroniser les utilisateurs si des IDs sont fournis
        if (!empty($request->validated('user_ids'))) {
            $role->users()->sync($request->validated('user_ids'));
        }

        // Rediriger avec un message de succès
        return to_route('role.index')->with('message', "Le rôle $role->nom a été créé avec succès");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::all();
        $users = User::where('id', '!=', auth()->id())->get();

        return view('admin.role.add', compact('permissions', 'users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        //on précharge les permissions pour éviter le "eager loading" (N + 1)
        $role->load('permissions');

        return view('admin.role.view', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::all();
        $users = User::where('id', '!=', auth()->id())->get();

        return view('admin.role.edit', compact('role', 'permissions', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if ($role->isAssignedToUsers()) {
            return back()
                ->with('error', 'Impossible de supprimer le rôle car il est attribué à un ou plusieurs utilisateurs.');
        }
        $role->delete();

        return back()->with('message', 'Rôle supprimer avec succès');
    }

    public function activer(Role $role): RedirectResponse
    {
        if ($role->isAssignedToUsers()) {
            return back()
                ->with('erreur', 'Impossible de désactiver le rôle car il est attribué à un ou plusieurs utilisateurs.');
        }

        $isModelActive = $role->etat;

        $message = $isModelActive ? "Rôle $role->nom désactivé" : "Rôle $role->nom activé";

        $role->update([
            'etat' => !$isModelActive
        ]);

        return back()->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        // Mettre à jour le rôle
        $role->update($request->only('nom', 'description'));

        // Synchroniser les permissions
        $role->permissions()->sync($request->validated('permissions'));

        // Synchroniser les utilisateurs
        $role->users()->sync($request->validated('user_ids', []));

        // Rediriger avec un message de succès
        return to_route('role.index')->with('message', "Le rôle {$role->nom} a été modifié avec succès");
    }

}
