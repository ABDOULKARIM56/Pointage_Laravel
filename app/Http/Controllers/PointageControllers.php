<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointageControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(string $id)
    {
        //
    }
}*/

namespace App\Http\Controllers;

use App\Models\Pointage;
use App\Models\Employe;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PointageControllers extends Controller
{
    /**
     * Afficher la liste des pointages avec filtres
     */
    public function index(Request $request)
    {
        $query = Pointage::with('employe');

        // Filtre par date
        if ($request->filled('date')) {
            $query->where('date', $request->date);
        } else {
            $query->where('date', today());
        }

        // Filtre par employé
        if ($request->filled('employe_id')) {
            $query->where('employe_id', $request->employe_id);
        }

        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $pointages = $query->latest()->get();
        $employes = Employe::orderBy('nom')->get();

        return view('pointage.index', compact('pointages', 'employes'));
    }

    /**
     * Pointer l'arrivée d'un employé
     */
    public function pointerArrivee(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'justification' => 'nullable|string|max:500'
        ]);

        $employe = Employe::findOrFail($request->employe_id);
        $today = today();

        // Vérifier si un pointage existe déjà pour aujourd'hui
        $pointage = Pointage::where('employe_id', $employe->id)
            ->where('date', $today)
            ->first();

        if ($pointage && $pointage->heure_arrivee) {
            return back()->with('error', 'Vous avez déjà pointé votre arrivée aujourd\'hui.');
        }

        if (!$pointage) {
            $pointage = new Pointage();
            $pointage->employe_id = $employe->id;
            $pointage->date = $today;
        }

        $heureArrivee = now();
        $pointage->heure_arrivee = $heureArrivee;
        
        // Déterminer le statut
        $heureLimite = Carbon::createFromTime(8, 30); // Heure limite à 8h30
        if ($heureArrivee->gt($heureLimite)) {
            $pointage->statut = 'retard';
            $pointage->justification = $request->justification ?? 'Retard non justifié';
        } else {
            $pointage->statut = 'présent';
            $pointage->justification = $request->justification;
        }

        $pointage->save();

        return back()->with('success', 'Arrivée pointée avec succès!');
    }

    /**
     * Pointer le départ d'un employé
     */
    public function pointerDepart(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id'
        ]);

        $employe = Employe::findOrFail($request->employe_id);
        $today = today();

        $pointage = Pointage::where('employe_id', $employe->id)
            ->where('date', $today)
            ->first();

        if (!$pointage || !$pointage->heure_arrivee) {
            return back()->with('error', 'Vous devez pointer votre arrivée d\'abord.');
        }

        if ($pointage->heure_depart) {
            return back()->with('error', 'Vous avez déjà pointé votre départ aujourd\'hui.');
        }

        $pointage->heure_depart = now();
        
        // Calculer la durée de travail en minutes
        if ($pointage->heure_arrivee && $pointage->heure_depart) {
            $duree = $pointage->heure_arrivee->diffInMinutes($pointage->heure_depart);
            $pointage->duree_travail = $duree;
        }

        $pointage->save();

        return back()->with('success', 'Départ pointé avec succès!');
    }

    /**
     * Marquer un employé comme absent
     */
    public function marquerAbsent(Request $request, $id)
    {
        $request->validate([
            'justification' => 'required|string|max:500'
        ]);

        $pointage = Pointage::findOrFail($id);
        $pointage->statut = 'absent';
        $pointage->justification = $request->justification;
        $pointage->save();

        return back()->with('success', 'Absence enregistrée avec succès!');
    }

    /**
     * Afficher les détails d'un pointage
     */
    public function show($id)
    {
        $pointage = Pointage::with('employe')->findOrFail($id);
        return view('pointage.show', compact('pointage'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $pointage = Pointage::findOrFail($id);
        $employes = Employe::orderBy('nom')->get();
        return view('pointage.edit', compact('pointage', 'employes'));
    }

    /**
     * Mettre à jour un pointage
     */
    public function update(Request $request, $id)
    {
        $pointage = Pointage::findOrFail($id);

        $validated = $request->validate([
            'heure_arrivee' => 'nullable|date_format:H:i',
            'heure_depart' => 'nullable|date_format:H:i|after:heure_arrivee',
            'statut' => 'required|in:présent,absent,retard,congé',
            'justification' => 'nullable|string|max:500'
        ]);

        // Recalculer la durée si les heures changent
        if ($request->heure_arrivee && $request->heure_depart) {
            $arrivee = Carbon::createFromFormat('H:i', $request->heure_arrivee);
            $depart = Carbon::createFromFormat('H:i', $request->heure_depart);
            $validated['duree_travail'] = $arrivee->diffInMinutes($depart);
        }

        $pointage->update($validated);

        return redirect()->route('pointage.index')->with('success', 'Pointage modifié avec succès!');
    }

    /**
     * Générer un rapport des pointages
     */
    public function rapport(Request $request)
    {
        $query = Pointage::with('employe');

        if ($request->filled('date_debut') && $request->filled('date_fin')) {
            $query->whereBetween('date', [$request->date_debut, $request->date_fin]);
        } elseif ($request->filled('mois')) {
            $query->whereMonth('date', $request->mois);
        } else {
            $query->whereMonth('date', now()->month);
        }

        if ($request->filled('employe_id')) {
            $query->where('employe_id', $request->employe_id);
        }

        $pointages = $query->get();
        $employes = Employe::orderBy('nom')->get();

        // Calculer les statistiques
        $stats = [
            'total_jours' => $pointages->count(),
            'presents' => $pointages->where('statut', 'présent')->count(),
            'absents' => $pointages->where('statut', 'absent')->count(),
            'retards' => $pointages->where('statut', 'retard')->count(),
        ];

        return view('pointage.rapport', compact('pointages', 'employes', 'stats'));
    }
}
