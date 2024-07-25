<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on récupère les différents clients dans notre model role
        $roles = Role::paginate(10);
        return view('admin.Role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Role::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return to_route('role.index')->with('message', "Le role a ete cree avec succe");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Role.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.Role.view', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.Role.edit', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('message', 'Rôle supprimer avec succès');
    }

    public function activer(Role $role)
    {
        $isModelActive = $role->etat;

        $message = $isModelActive ? 'Rôle désactivé' : 'Rôle activé';

        $role->update([
            'etat' => !$isModelActive
        ]);

        return back()->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return to_route('role.index')->with('message', "Le role a ete modifié avec succe");
    }
}

