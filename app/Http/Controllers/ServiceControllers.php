<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Departement;
use Illuminate\Http\Request;

class ServiceControllers extends Controller
{
    /**
     * Affiche la liste de tous les services.
     */
    public function index(Request $request)
    {
        $query = Service::with('departement'); // Charge les infos du département associé

        //  Filtrer par nom de service si précisé
        if ($request->has('nom') && !empty($request->nom)) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }

        //  Filtrer par département si précisé
        if ($request->has('departement_id') && !empty($request->departement_id)) {
            $query->where('departement_id', $request->departement_id);
        }

        $services = $query->get();
        foreach ($services as $service) {
            $service->nom;
            $service->departement_id=Departement::findOrFail($service->departement_id);
        }
        return view('service.showService', compact('services'));
    }

    /**
     * Affiche le formulaire de création d’un service.
     */
    public function create()
    {
        $departements = Departement::all(); // Pour choisir le département
        return view('service.createService', compact('departements'));
    }

    /**
     * Enregistre un nouveau service dans la base.
     */
    public function store(Request $request)
    {
        //  Validation du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        //  Enregistrement
        Service::create($request->all());

        return redirect()->route('show_service')->with('success', 'Service ajouté avec succès.');
    }

    /**
     * Affiche les détails d’un service.
     */
    public function show(Service $service)
    {
        $service->load('departement'); // Charge les infos du département lié
        return view('service.showService', compact('service'));
    }

    /**
     * Affiche le formulaire d’édition d’un service existant.
     */
    public function edit(Service $service)
    {
        $departements = Departement::all();
        return view('service.editservice', compact('service', 'departements'));
    }

    /**
     * Met à jour les informations d’un service.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $service->update($request->all());

        return redirect()->route('show_service')->with('success', 'Service modifié avec succès.');
    }

    /**
     * Supprime un service.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('show_service')->with('success', 'Service supprimé avec succès.');
    }
}
