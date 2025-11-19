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
    // public function index(Request $request)
    // {
    //     $query = Service::with('departement'); // Charge les infos du département associé

    //    $filters = ['nom', 'departement_id'];

    //     $query->where(function ($q) use ($request, $filters) {
    //         foreach ($filters as $field) {
    //             if ($request->has('nom') && !empty($request->nom)) {
    //                 $q->orWhere($field, 'like', '%' . $request->nom . '%');
    //             }
    //         }
    //     })->distinct();

    //     $services = $query->get();
    //     $liste=[];
    //     foreach ($services as $service) {
    //         $service->nom=$service->nom;
    //         $service->departement_id=Departement::findOrFail($service->departement_id);
    //     }
    //     return view('service.showService', compact('services'));
    // }


      /**
     * Affiche la liste de tous les services avec filtres (nom service ou nom département)
     */
    public function index(Request $request)
    {
        // On charge la relation departement
        $query = Service::with('departement');

        // Filtrage
        $nom = $request->input('nom'); // terme de recherche

        if (!empty($nom)) {
            $query->where(function ($q) use ($nom) {
                // Recherche par nom du service
                $q->where('nom', 'like', "%$nom%")
                  // OU par nom du département lié
                  ->orWhereHas('departement', function ($subQuery) use ($nom) {
                      $subQuery->where('nom', 'like', "%$nom%");
                  });
            });
        }

        // Récupération des services
        // $services = $query->get();
        $services = $query->paginate(5);
        // Retour à la vue
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
