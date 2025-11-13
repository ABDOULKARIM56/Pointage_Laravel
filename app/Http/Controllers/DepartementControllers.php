<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementControllers extends Controller
{
    //  Afficher la liste des départements avec possibilité de recherche
    public function index(Request $request)
    {
        $query = Departement::query();

        // if ($request->has('nom') && !empty($request->nom)) {
        //     $query->where('nom', 'like', '%' . $request->nom . '%');
        // }
       $filters = ['nom', 'description'];

        $query->where(function ($q) use ($request, $filters) {
            foreach ($filters as $field) {
                if ($request->has('nom') && !empty($request->nom)) {
                    $q->orWhere($field, 'like', '%' . $request->nom . '%');
                }
            }
        })->distinct();


        // $departements = $query->get();
        $departements = $query->paginate(2);


        return view('departement.ShowDepartement', compact('departements'));
    }

    //  Afficher le formulaire pour créer un nouveau département
    public function create()
    {
        return view('departement.CreateDepartement');
    }

    //  Enregistrer un nouveau département
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:departements,nom',
            'description' => 'nullable|string|max:500',
        ]);

        Departement::create($request->all());

        return redirect()->route('show_departement')
                         ->with('success', 'Département ajouté avec succès !');
    }

    //  Afficher un département spécifique
    public function show($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.ShowDepartement', compact('departement'));
    }

    //  Afficher le formulaire pour éditer un département
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.EditDepartement', compact('departement'));
    }

    //  Mettre à jour un département existant
    public function update(Request $request, $id)
    {
        $departement = Departement::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255|unique:departements,nom,' . $departement->id,
            'description' => 'nullable|string|max:500',
        ]);

        $departement->update($request->all());

        return redirect()->route('show_departement')
                         ->with('success', 'Département mis à jour avec succès !');
    }

    //  Supprimer un département
    public function destroy($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();

        return redirect()->route('show_departement')
                         ->with('success', 'Département supprimé avec succès !');
    }
}
