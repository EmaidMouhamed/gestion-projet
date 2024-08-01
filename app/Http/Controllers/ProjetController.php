<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetRequest;
use App\Models\Projet;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //on récupère les différents clients dans notre model projet
        $projets = Projet::where('user_id', auth()->id())->paginate(10);
        return view('admin.projet.index', compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjetRequest $request): RedirectResponse
    {
        $request->user()->projets()->create($request->validated());

        return to_route('projet.index')->with('message', "Le projet $request->nom a été crée avec succès");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projet.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet): View
    {
        return view('admin.projet.view', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet): View
    {
        return view('admin.projet.edit', compact('projet'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet): RedirectResponse
    {
        $projet->delete();

        return back()->with('message', "Projet $projet->nom supprimer avec succès");
    }

    /*    public function activer(Projet $projet)
        {
            $isModelActive = $projet->etat;

            $message = $isModelActive ? "Projet $projet->nom désactivé" : "Projet $projet->nom activé";

            $projet->update([
                'etat' => !$isModelActive
            ]);

            return back()->with('message', $message);
        }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjetRequest $request, Projet $projet): RedirectResponse
    {
        $projet->update($request->validated());

        return to_route('projet.index')->with('message', "Le projet $projet->nom a été modifié avec succès");
    }
}
