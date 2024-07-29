<?php

namespace App\Http\Controllers;

use App\Http\Requests\TacheRequest;
use App\Models\Projet;
use App\Models\Tache;
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
        $projets = Projet::all();
        return view('admin.tache.add',compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TacheRequest $request)
    {
        Tache::create($request->all());
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
        return view('admin.tache.edit', compact('tache'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tache $tache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
