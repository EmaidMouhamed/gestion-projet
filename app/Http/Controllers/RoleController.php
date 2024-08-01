<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //on récupère les différents clients dans notre model role
        $roles = Role::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->permissions()->sync($request->permissions);

        return to_route('role.index')->with('message', "Le role $request->nom a été cree avec succès");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.role.add', [
            'permissions' => Permission::all(),
            'role' => new Role()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view('admin.role.view', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return back()->with('message', 'Rôle supprimer avec succès');
    }

    public function activer(Role $role): RedirectResponse
    {
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
        $role->update($request->validated());

        $role->permissions()->sync($request->permissions);

        return to_route('role.index')->with('message', "Le role $role->nom a été modifié avec succès");
    }
}
