<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionControllers extends Controller
{
     //  Afficher la liste des Permissions avec possibilité de recherche
    public function index(Request $request)
    {
        $query = Permission::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        // $permissions = $query->get();
         $permissions = $query->paginate(5);

        return view('permission.ShowPermission', compact('permissions'));
    }

    //  Afficher le formulaire pour créer un nouveau Permission
    public function create()
    {
        return view('permission.CreatePermission');
    }

    //  Enregistrer un nouveau Permission
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255|unique:permissions,type',
        ]);

        Permission::create($request->all());

        return redirect()->route('show_permission')
                         ->with('success', 'Permission ajouté avec succès !');
    }

    //  Afficher un Permission spécifique
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.ShowPermission', compact('permission'));
    }

    //  Afficher le formulaire pour éditer un Permission
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.EditPermission', compact('permission'));
    }

    //  Mettre à jour un Permission existant
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'type' => 'required|string|max:255|unique:permissions,type,' . $permission->id,
        ]);

        $permission->update($request->all());

        return redirect()->route('show_permission')
                         ->with('success', 'Permission mis à jour avec succès !');
    }

    //  Supprimer un Permission
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('show_permission')
                         ->with('success', 'Permission supprimé avec succès !');
    }
}
