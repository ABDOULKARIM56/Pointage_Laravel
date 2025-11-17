<?php

/*namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Service; // 🔹 Import du modèle Service
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeControlles extends Controller
{
    // 🔹 Afficher la liste des employés avec filtre par nom
    public function index(Request $request)
    {
        $query = Employe::query();

        if ($request->has('nom') && !empty($request->nom)) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        $employe = $query->get();

        return view('employe.ShowEmploye', compact('employe'));
    }

    // 🔹 Afficher le formulaire pour créer un nouvel employé
    public function create()
    {
        $services = Service::all(); // 🔹 Récupère tous les services
        return view('employe.CreateEmploye', compact('services')); // 🔹 Passe la variable à la vue
    }

    // 🔹 Enregistrer un nouvel employé
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'matricule' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:employes,email',
            'nationalite' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'etat_civil' => 'required|string|max:50',
            'numero' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id', // 🔹 Vérifie que le service existe
            'role' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'date_naissance' => 'nullable',
        ]);

        if ($request->filled('date_naissance')) {
            try {
                $carbonDate = Carbon::createFromFormat('d/m/Y', $request->date_naissance);
            } catch (\Exception $e) {
                try {
                    $carbonDate = Carbon::createFromFormat('Y-m-d', $request->date_naissance);
                } catch (\Exception $e) {
                    return back()->withErrors([
                        'date_naissance' => 'Format de date invalide (JJ/MM/AAAA ou AAAA-MM-JJ)'
                    ])->withInput();
                }
            }
            $request->merge(['date_naissance' => $carbonDate->format('Y-m-d')]);
        }

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
            'service_id' => $request->service_id,
            'role' => $request->role,
            'date_naissance' => $request->date_naissance,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employe.ShowEmploye')->with('success', 'Employé ajouté avec succès !');
    }

    // 🔹 Les autres méthodes (show, edit, update, destroy) restent inchangées
}*/

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class EmployeController extends Controller
{
    /**
     * Afficher la liste des employés avec filtres
     */
    public function index(Request $request)
    {
        $query = Employe::with('service');

        // Filtre par nom
        if ($request->filled('nom')) {
            $query->where(function($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->nom . '%')
                  ->orWhere('prenom', 'like', '%' . $request->nom . '%')
                  ->orWhere('matricule', 'like', '%' . $request->nom . '%');
            });
        }

        // Filtre par service
        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        // Filtre par rôle
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $employes = $query->latest()->get();
        $services = Service::orderBy('nom')->get();

        return view('employe.ShowEmploye', compact('employes', 'services'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $services = Service::orderBy('nom')->get();
        return view('employe.CreateEmploye', compact('services'));
    }

    /**
     * Enregistrer un nouvel employé
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'matricule' => 'required|string|max:50|unique:employes,matricule',
            'email' => 'required|email|max:255|unique:employes,email',
            'nationalite' => 'required|string|max:100',
            'genre' => ['required', Rule::in(['Homme', 'Femme'])],
            'etat_civil' => ['required', Rule::in(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)'])],
            'numero' => 'required|string|max:20',
            'adresse' => 'required|string|max:500',
            'service_id' => 'required|exists:services,id',
            'role' => ['required', Rule::in(['Admin', 'Manager', 'Employé'])],
            'password' => 'required|string|min:8',
            'date_naissance' => 'required|date|before:today',
        ], [
            'matricule.unique' => 'Ce matricule existe déjà.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'email.email' => 'L\'adresse email doit être valide.',
            'date_naissance.before' => 'La date de naissance doit être antérieure à aujourd\'hui.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ]);

        // Hasher le mot de passe
        $validated['password'] = Hash::make($validated['password']);

        // Créer l'employé
        Employe::create($validated);

        return redirect()
            ->route('employe.ShowEmploye')
            ->with('success', 'Employé ajouté avec succès !');
    }

    /**
     * Afficher les détails d'un employé
     */
    public function show($id)
    {
        $employe = Employe::with('service')->findOrFail($id);
        return view('employe.ShowDetailEmploye', compact('employe'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        $services = Service::orderBy('nom')->get();
        return view('employe.EditEmploye', compact('employe', 'services'));
    }

    /**
     * Mettre à jour un employé
     */
    public function update(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'matricule' => ['required', 'string', 'max:50', Rule::unique('employes')->ignore($id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('employes')->ignore($id)],
            'nationalite' => 'required|string|max:100',
            'genre' => ['required', Rule::in(['Homme', 'Femme'])],
            'etat_civil' => ['required', Rule::in(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)'])],
            'numero' => 'required|string|max:20',
            'adresse' => 'required|string|max:500',
            'service_id' => 'required|exists:services,id',
            'role' => ['required', Rule::in(['Admin', 'Manager', 'Employé'])],
            'date_naissance' => 'required|date|before:today',
        ], [
            'matricule.unique' => 'Ce matricule existe déjà.',
            'email.unique' => 'Cet email est déjà utilisé.',
        ]);

        // Mettre à jour l'employé
        $employe->update($validated);

        return redirect()
            ->route('employe.ShowEmploye')
            ->with('success', 'Employé modifié avec succès !');
    }

    /**
     * Supprimer un employé
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()
            ->route('employe.ShowEmploye')
            ->with('success', 'Employé supprimé avec succès !');
    }

    /**
     * Mettre à jour le mot de passe
     */
    public function updatePassword(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ]);

        $employe->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Mot de passe modifié avec succès !');
    }
}
