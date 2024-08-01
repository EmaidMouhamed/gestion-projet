<?php

namespace App\Http\Controllers;

use App\Http\Requests\SousTacheRequest;
use App\Models\SousTache;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SousTacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //on récupère les différents clients dans notre model tache
        $sousTaches = SousTache::paginate(10);
        return view('admin.sousTache.index', compact('sousTaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?Tache $tache = null): View
    {
        $users = User::all();
        if ($tache) {
            return view('admin.sousTache.add', compact('tache', 'users'));
        }

        $taches = Tache::all();
        return view('admin.sousTache.add', compact('taches', 'tache', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SousTacheRequest $request): RedirectResponse
    {
        $sousTache = SousTache::create($request->all());
        $sousTache->users()->sync($request->input('user_id'));
        return to_route('.sousTacheshow', $sousTache->tache->id)->with('message', "La sous tache $request->nom a été crée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(SousTache $sousTache)
    {
        $users = User::select('id', 'name')->get();
        return view('admin.sousTache.view', compact('sousTache','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SousTache $sousTache)
    {
        $users = User::select('id', 'name')->get();
        $taches = Tache::select('id', 'nom')->get();
        return view('admin.sousTache.edit', compact('sousTache', 'taches', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SousTache $sousTache)
    {
        $sousTache->update($request->validated());
        $sousTache->users()->sync($request->input('user_id'));
        return to_route('sousTache.show', $sousTache->tache->id)->with('message', "La sous tache $sousTache->nom a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousTache $sousTache)
    {
        $sousTache->delete();

        return back()->with('message', "Sous tache $sousTache->nom supprimer avec succès");
    }
}
