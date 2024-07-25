<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on recupére les différentes clients dans notre model role
        $roles=Role::all();
        return view('admin.Role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Role.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role= new role();
        $role-> nom= $request -> nom;
        $role-> description= $request -> description;        
        $role-> save();
        return to_route('role.index')->with('message',"Le role a ete cree avec succe");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role=Role::findOrFail($id);
        return view('admin.Role.view',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //comme un select 
        $role=Role::findOrFail($id);
        return view('admin.Role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $role=Role::find($id);
        $role-> nom= $request -> nom;
        $role-> description= $request -> description;
        $role-> save();
        return to_route('role.index')->with('message',"Le role a ete modifié avec succe");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role=Role::findOrFail($id);
        $message="";
        $erreur="";
        if ($role->etat==1) {
            $message="Role supprimmer avec succe";
            $role->delete();
        }
        else {
            $erreur="Suppression role non autorisée";
        }
        if ($message!="") {
            return BACK()-> with('message',$message);
        }else {
            return BACK()-> with('message',$erreur);
        }
    }
    public function activer($id)
    {
        $role=Role::findOrFail($id);
        if ($role->etat==0) 
        {
            $role->etat=1;
            $message="Role activé";
        }
        else 
        {
            $role->etat=0;
            $message="Role desactivé";
        }
        $role->save();
        return BACK()-> with('message',$message);
    }
}

