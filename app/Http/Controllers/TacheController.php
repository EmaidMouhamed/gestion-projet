<?php

namespace App\Http\Controllers;

use App\Http\Requests\TacheRequest;
use App\Models\Projet;
use App\Models\Tache;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TacheController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tache::class, 'tache');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //on récupère les différents clients dans notre model tache
        $taches = Tache::paginate(10);

        return view('admin.tache.index', compact('taches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TacheRequest $request): RedirectResponse
    {
        Tache::create($request->validated());

        return to_route('tache.index')->with('message', "La tache $request->nom a été crée avec succès");
    }

    public function create(?Projet $projet = null): View
    {
        if ($projet) {
            return view('admin.tache.add', compact('projet'));
        }

        $projets = Projet::all();

        return view('admin.tache.add', compact('projets', 'projet'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tache $tache): View
    {
        //on précharge les permissions pour éviter le "eager loading" (N + 1)
        $tache->load(['sousTaches', 'projet']);

        return view('admin.tache.view', compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache): View
    {
        $projets = Projet::select(['id', 'nom'])->get();

        return view('admin.tache.edit', compact('tache', 'projets'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TacheRequest $request, Tache $tache): RedirectResponse
    {
        $tache->update($request->validated());

        return to_route('tache.index')->with('message', "La tache $tache->nom a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache): RedirectResponse
    {
        $tache->delete();

        return back()->with('message', "tache $tache->nom supprimer avec succès");
    }
}
