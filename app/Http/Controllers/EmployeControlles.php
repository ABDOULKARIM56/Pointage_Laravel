<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeControlles extends Controller
{
    // 🔹 Afficher la liste des étudiants avec filtre par nom
    public function index(Request $request)
    {
        $query = Employe::query();

        if ($request->has('nom') && !empty($request->nom)) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        $employe = $query->get();

        return view('employe.ShowEmploye', compact('employe'));
    }

    // 🔹 Afficher le formulaire pour créer un nouvel étudiant
    public function create()
    {
        return view('employe.CreateEmploye');
    }


// 🔹 Enregistrer un nouvel étudiant
public function store(Request $request)
{
    $request->validate([
              
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'matricule' => 'required|string|max:50',
        'email' => 'required|string|max:50|unique:employe',
        'nationalite' => 'required|string|max:50',
        'genre' => 'required|string|max:50',
        'etat_civil' => 'required|string|max:50',
        'numero' => 'required|string|max:50',
        'adresse' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'password' => 'required|string|max:50',
        'role' => 'required|string|max:50',
        'date_naissance' => 'nullable',
    ]);

    // 🧠 Conversion automatique du format de date
    if ($request->filled('date_naissance')) {
        $date = $request->date_naissance;

        try {
            // Essaye le format français
            $carbonDate = Carbon::createFromFormat('d/m/Y', $date);
        } catch (\Exception $e) {
            try {
                // Sinon, le format HTML
                $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
            } catch (\Exception $e) {
                // Si aucun ne marche, tu peux soit ignorer soit lever une erreur
                return back()->withErrors(['date_naissance' => 'Format de date invalide (attendu JJ/MM/AAAA ou AAAA-MM-JJ)'])->withInput();
            }
        }

        $request->merge(['date_naissance' => $carbonDate->format('Y-m-d')]);
    }

    //Employe::create($request->all());
    Employe::create([
    'nom' => $request->nom,
    'prenom' => $request->prenom,
    'matricule' => $request->matricule,
    'email' => $request->email,
    'nationalite' => $request->nationalite,
    'genre' => $request->genre,
    'etat_civil' => $request->etat_civil,
    'numero' => $request->numero,
    'adresse' => $request->adresse,
    'service' => $request->service,
    'role' => $request->role,
    'date_naissance' => $request->date_naissance,
    'password' => Hash::make($request->password), // 🔥 mot de passe crypté ici
]);


    return redirect()->route('employe.ShowEmploye')->with('success', 'Étudiant ajouté avec succès !');
}
    // 🔹 Afficher un étudiant spécifique
    public function show($id)
    {
        $employe = Employe::findOrFail($id);
        return view('employe.ShowEmploye', compact('employe'));
    }

    // 🔹 Afficher le formulaire pour éditer un étudiant
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        return view('employe.EditEmploye', compact('employe'));
    }

    // 🔹 Mettre à jour un étudiant existant
   public function update(Request $request, $id)
{
    $employe = Employe::findOrFail($id);

    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'matricule' => 'required|string|max:50',
        'email' => 'required|string|max:50|unique:employe,email,' . $employe->id,
        'nationalite' => 'required|string|max:50',
        'genre' => 'required|string|max:50',
        'etat_civil' => 'required|string|max:50',
        'numero' => 'required|string|max:50',
        'adresse' => 'required|string|max:255',
        'service_id' => 'required|exists:conges,id',
        'password' => 'required|string|max:50',
        'role' => 'required|string|max:50',
        'date_naissance' => 'nullable',
    ]);

    if ($request->filled('date_naissance')) {
        $date = $request->date_naissance;

        try {
            $carbonDate = Carbon::createFromFormat('d/m/Y', $date);
        } catch (\Exception $e) {
            try {
                $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
            } catch (\Exception $e) {
                return back()->withErrors(['date_naissance' => 'Format de date invalide (attendu JJ/MM/AAAA ou AAAA-MM-JJ)'])->withInput();
            }
        }

        $request->merge(['date_naissance' => $carbonDate->format('Y-m-d')]);
    }

   // $employe->update($request->all());
    $employe->update([
    'nom' => $request->nom,
    'prenom' => $request->prenom,
    'matricule' => $request->matricule,
    'email' => $request->email,
    'nationalite' => $request->nationalite,
    'genre' => $request->genre,
    'etat_civil' => $request->etat_civil,
    'numero' => $request->numero,
    'adresse' => $request->adresse,
    'service' => $request->service_id,
    'role' => $request->role,
    'date_naissance' => $request->date_naissance,
    'password' => Hash::make($request->password),
]);


    return redirect()->route('employe.ShowEmploye')->with('success', 'Étudiant mis à jour avec succès !');
}

    // 🔹 Supprimer un étudiant
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()->route('employe.ShowEmploye')->with('success', 'Étudiant supprimé avec succès !');
    }
}

