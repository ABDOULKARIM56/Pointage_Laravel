@extends('layouts.app')

@section('title', 'Rapport des Pointages')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-chart-bar me-2 text-primary"></i> Rapport des Pointages
            </h2>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-filter me-2"></i> Filtres du Rapport</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('pointage.rapport') }}" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Période (début-fin)</label>
                    <div class="row g-2">
                        <div class="col-6">
                            <input type="date" name="date_debut" class="form-control" value="{{ request('date_debut') }}">
                        </div>
                        <div class="col-6">
                            <input type="date" name="date_fin" class="form-control" value="{{ request('date_fin') }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Ou par mois</label>
                    <input type="month" name="mois" class="form-control" value="{{ request('mois') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Employé</label>
                    <select name="employe_id" class="form-select">
                        <option value="">Tous les employés</option>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}" 
                                {{ request('employe_id') == $employe->id ? 'selected' : '' }}>
                                {{ $employe->prenom }} {{ $employe->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-chart-line me-1"></i> Générer le rapport
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h4 class="fw-bold">{{ $stats['total_jours'] }}</h4>
                    <p class="mb-0">Total Jours</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h4 class="fw-bold">{{ $stats['presents'] }}</h4>
                    <p class="mb-0">Présents</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h4 class="fw-bold">{{ $stats['absents'] }}</h4>
                    <p class="mb-0">Absents</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body text-center">
                    <h4 class="fw-bold">{{ $stats['retards'] }}</h4>
                    <p class="mb-0">Retards</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau détaillé -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Détail des Pointages</h5>
            <span class="badge bg-light text-dark">{{ $pointages->count() }} enregistrements</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employé</th>
                            <th>Service</th>
                            <th>Arrivée</th>
                            <th>Départ</th>
                            <th>Durée</th>
                            <th>Statut</th>
                            <th>Justification</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pointages as $pointage)
                            <tr>
                                <td>{{ $pointage->date->format('d/m/Y') }}</td>
                                <td>{{ $pointage->employe->prenom }} {{ $pointage->employe->nom }}</td>
                                <td>{{ $pointage->employe->service->nom }}</td>
                                <td>{{ $pointage->heure_arrivee ? $pointage->heure_arrivee->format('H:i') : '-' }}</td>
                                <td>{{ $pointage->heure_depart ? $pointage->heure_depart->format('H:i') : '-' }}</td>
                                <td>
                                    @if($pointage->duree_travail)
                                        {{ floor($pointage->duree_travail / 60) }}h{{ $pointage->duree_travail % 60 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($pointage->statut == 'présent')
                                        <span class="badge bg-success">{{ $pointage->statut }}</span>
                                    @elseif($pointage->statut == 'retard')
                                        <span class="badge bg-warning text-dark">{{ $pointage->statut }}</span>
                                    @elseif($pointage->statut == 'absent')
                                        <span class="badge bg-danger">{{ $pointage->statut }}</span>
                                    @else
                                        <span class="badge bg-info">{{ $pointage->statut }}</span>
                                    @endif
                                </td>
                                <td>{{ $pointage->justification ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <p>Aucun pointage trouvé pour les critères sélectionnés</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bouton d'export -->
            @if($pointages->count() > 0)
                <div class="mt-3">
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-file-excel me-1"></i> Exporter en Excel
                    </a>
                    <a href="#" class="btn btn-danger ms-2">
                        <i class="fas fa-file-pdf me-1"></i> Exporter en PDF
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection