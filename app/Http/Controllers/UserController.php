<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::where('id', '!=', auth()->user()->id)
             ->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('role_id'));

        return to_route('user.index')
        ->with('message', "L'utilisateur $request->name a été crée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        //on précharge les permissions pour éviter le "eager loading" (N + 1)
        $user->load(['user', 'roles']);

        return view('admin.user.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::select(['id', 'nom'])->get();
        return view('admin.user.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('role_id'));

        return to_route('user.index')
        ->with('message', "L'utilisateur $request->name a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('message', "L'utilisateur $user->name supprimer avec succès");
    }
}
