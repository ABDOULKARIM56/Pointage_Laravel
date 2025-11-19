<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Service;

class DashboardController extends Controller
{
    /**
     * Charge le tableau de bord principal.
     * Utilisé pour le chargement initial ou le retour à la vue par défaut.
     */
    public function index(Request $request)
    {
        // Récupère le mode (list par défaut)
        $mode = $request->get('mode', 'list');

        // DÉFINITION CRUCIALE: Récupère l'onglet actif de la requête (ou #permissions par défaut)
        $activeTab = $request->get('activeTab', '#permissions');

        // Récupère toutes les données nécessaires pour tous les onglets
        $permissions = Permission::paginate(5);
        $services = Service::with('departement')->paginate(5);
        $conges = Conge::paginate(5);
        $departements = Departement::paginate(5);

        // Retourne la vue en passant toutes les collections, le mode, et l'onglet actif
        return view('dashboard.index', compact('mode','departements','services','conges','permissions', 'activeTab'));
    }

    /**
     * Gère les actions spécifiques pour l'onglet Permissions.
     */
    public function index_permission(Request $request)
    {
        $mode = $request->get('mode', 'list');
        $id = $request->get('id');

        // CAPTURE DE L'ONGLET ACTIF : #permissions si non spécifié dans la requête
        $activeTab = $request->get('activeTab', '#permissions');

        if($id && ($mode === 'edit' || $mode === 'show'))
        {
            $permissions = Permission::findOrFail($id);
        } else {
            $query = Permission::query();

            if ($request->has('type') && !empty($request->type)) {
                $query->where('type', 'like', '%' . $request->type . '%');
            }
            $permissions = $query->paginate(5);
        }

        // Récupérer toutes les collections pour les AUTRES onglets
        $services = Service::with('departement')->paginate(5);
        $departements = Departement::paginate(5);
        $conges = Conge::paginate(5);

        // Passage de 'activeTab' à la vue
        return view('dashboard.index', compact('permissions', 'services', 'departements', 'conges', 'mode', 'activeTab'));
    }

    /**
     * Gère les actions spécifiques pour l'onglet Départements.
     */
    public function index_departement(Request $request)
    {
        $mode = $request->get('mode', 'list');
        $id = $request->get('id');

        // CAPTURE DE L'ONGLET ACTIF : #departements
        $activeTab = $request->get('activeTab', '#departements');

        if($id && ($mode === 'edit' || $mode === 'show'))
        {
            $departements = Departement::findOrFail($id);
        } else {
            $query = Departement::query();

            if ($request->has('nom') && !empty($request->nom)) {
                $search = '%' . $request->nom . '%';
                $query->where('nom', 'like', $search)
                      ->orWhere('description', 'like', $search);
            }

            $departements = $query->paginate(5);
        }

        // Récupérer toutes les collections pour les AUTRES onglets.
        $permissions = Permission::paginate(5);
        $services = Service::with('departement')->paginate(5);
        $conges = Conge::paginate(5);

        // Passage de 'activeTab' à la vue
        return view('dashboard.index', compact('departements', 'permissions', 'services', 'conges', 'mode', 'activeTab'));
    }

    /**
     * Gère les actions spécifiques pour l'onglet Services.
     */
    public function index_service(Request $request)
    {
        $mode = $request->get('mode', 'list');
        $id = $request->get('id');

        // CAPTURE DE L'ONGLET ACTIF : #services
        $activeTab = $request->get('activeTab', '#services');

        if($id && ($mode === 'edit' || $mode === 'show'))
        {
            $services = Service::findOrFail($id);
        } else {
            $query = Service::query();
            $query->with('departement');

            if ($request->has('nom') && !empty($request->nom)) {
                $search = '%' . $request->nom . '%';
                $query->where('nom', 'like', $search)
                      ->orWhereHas('departement', function ($q) use ($search) {
                          $q->where('nom', 'like', $search);
                      });
            }
            $services = $query->paginate(5);
        }

        // Récupérer toutes les collections pour les AUTRES onglets.
        $permissions = Permission::paginate(5);
        $departements = Departement::paginate(5);
        $conges = Conge::paginate(5);

        // Passage de 'activeTab' à la vue
        return view('dashboard.index', compact('services', 'permissions', 'departements', 'conges', 'mode', 'activeTab'));
    }

    /**
     * Gère les actions spécifiques pour l'onglet Congés.
     */
    public function index_conge(Request $request)
    {
        $mode = $request->get('mode', 'list');
        $id = $request->get('id');

        // CAPTURE DE L'ONGLET ACTIF : #conges
        $activeTab = $request->get('activeTab', '#conges');

        if($id && ($mode === 'edit' || $mode === 'show'))
        {
            $conges = Conge::findOrFail($id);
        } else {
            $query = Conge::query();

            if ($request->has('type') && !empty($request->type)) {
                $query->where('type', 'like', '%' . $request->type . '%');
            }
            $conges = $query->paginate(5);
        }

        // Récupérer toutes les collections pour les AUTRES onglets.
        $permissions = Permission::paginate(5);
        $services = Service::with('departement')->paginate(5);
        $departements = Departement::paginate(5);

        // Passage de 'activeTab' à la vue
        return view('dashboard.index', compact('conges', 'permissions', 'services', 'departements', 'mode', 'activeTab'));
    }
}

