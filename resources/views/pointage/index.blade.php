@extends('layouts.app')

@section('title', 'Pointage des Employés')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-clock me-2 text-primary"></i> Pointage des Employés
            </h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Formulaire de pointage -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-fingerprint me-2"></i> Pointer</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('pointage.arrivee') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pointer l'arrivée</label>
                            <select name="employe_id" class="form-select" required>
                                <option value="">Sélectionnez un employé</option>
                                @foreach($employes as $employe)
                                    <option value="{{ $employe->id }}">{{ $employe->prenom }} {{ $employe->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Justification (si retard)</label>
                            <textarea name="justification" class="form-control" rows="2" placeholder="Raison du retard..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sign-in-alt me-1"></i> Pointer l'arrivée
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('pointage.depart') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pointer le départ</label>
                            <select name="employe_id" class="form-select" required>
                                <option value="">Sélectionnez un employé</option>
                                @foreach($employes as $employe)
                                    <option value="{{ $employe->id }}">{{ $employe->prenom }} {{ $employe->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-sign-out-alt me-1"></i> Pointer le départ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des pointages du jour -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Pointages du Jour</h5>
            <span class="badge bg-light text-dark">{{ $pointages->count() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Employé</th>
                            <th>Heure d'arrivée</th>
                            <th>Heure de départ</th>
                            <th>Durée</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pointages as $pointage)
                            <tr>
                                <td>{{ $pointage->employe->prenom }} {{ $pointage->employe->nom }}</td>
                                <td>{{ $pointage->heure_arrivee ? $pointage->heure_arrivee->format('H:i') : '-' }}</td>
                                <td>{{ $pointage->heure_depart ? $pointage->heure_depart->format('H:i') : '-' }}</td>
                                <td>{{ $pointage->duree_travail ? floor($pointage->duree_travail / 60) . 'h' . ($pointage->duree_travail % 60) : '-' }}</td>
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
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('pointage.show', $pointage->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pointage.edit', $pointage->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <p>Aucun pointage pour aujourd'hui</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection