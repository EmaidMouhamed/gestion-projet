<?php

namespace App\Http\Controllers;

use App\Http\Requests\TacheRequest;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on récupère les différents clients dans notre model tache
        $taches = Tache::paginate(10);
        return view('admin.tache.index', compact('taches'));
    }

    public function create()
    {
        $users = User::all();
        $projets = Projet::all();
        return view('admin.tache.add',compact('projets','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TacheRequest $request)
    {
        $tache = Tache::create($request->all());
        $tache->users()->sync($request->input('user_id'));
        return to_route('tache.index')->with('message', "La tache $request->nom a été crée avec succès");
    }


    /**
     * Display the specified resource.
     */
    public function show(Tache $tache)
    {
        return view('admin.tache.view', compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache)
    {
        $users = User::select('id','name')->get();
        $projets = Projet::select('id','nom')->get();
        return view('admin.tache.edit', compact('tache','projets','users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TacheRequest $request, Tache $tache)
    {
        $tache->update($request->validated());
        $tache->users()->sync($request->input('user_id'));
        return to_route('tache.index')->with('message', "La tache $tache->nom a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        $tache->delete();

        return back()->with('message', "tache $tache->nom supprimer avec succès");
    }
}
