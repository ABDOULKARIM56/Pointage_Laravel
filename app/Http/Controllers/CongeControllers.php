<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;

class CongeControllers extends Controller
{
     //  Afficher la liste des conges avec possibilité de recherche
    public function index(Request $request)
    {
        $query = Conge::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        // $conges = $query->get();
        $conges = $query->paginate(5);

        

        return view('conge.Showconge', compact('conges'));
    }

    //  Afficher le formulaire pour créer un nouveau conge
    public function create()
    {
        return view('conge.Createconge');
    }

    //  Enregistrer un nouveau conge
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255|unique:conges,type',
        ]);

        Conge::create($request->all());

        return redirect()->route('show_conge')
                         ->with('success', 'conge ajouté avec succès !');
    }

    //  Afficher un conge spécifique
    public function show($id)
    {
        $conge = Conge::findOrFail($id);
        return view('conge.Showconge', compact('conge'));
    }

    //  Afficher le formulaire pour éditer un conge
    public function edit($id)
    {
        $conge = Conge::findOrFail($id);
        return view('conge.Editconge', compact('conge'));
    }

    //  Mettre à jour un conge existant
    public function update(Request $request, $id)
    {
        $conge = Conge::findOrFail($id);

        $request->validate([
            'type' => 'required|string|max:255|unique:conges,type,' . $conge->id,
        ]);

        $conge->update($request->all());

        return redirect()->route('show_conge')
                         ->with('success', 'conge mis à jour avec succès !');
    }

    //  Supprimer un conge
    public function destroy($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->delete();

        return redirect()->route('show_conge')
                         ->with('success', 'conge supprimé avec succès !');
    }
}
