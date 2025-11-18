@extends('layouts.app')

@section('title', 'Modifier le Pointage')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-edit me-2 text-primary"></i> Modifier le Pointage
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pointage.index') }}">Pointage</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-pencil-alt me-2"></i> Modifier le Pointage</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pointage.update', $pointage->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Employé</label>
                            <select name="employe_id" class="form-select" disabled>
                                <option value="{{ $pointage->employe_id }}">
                                    {{ $pointage->employe->prenom }} {{ $pointage->employe->nom }}
                                </option>
                            </select>
                            <small class="text-muted">L'employé ne peut pas être modifié</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" class="form-control" value="{{ $pointage->date->format('Y-m-d') }}" disabled>
                            <small class="text-muted">La date ne peut pas être modifiée</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Heure d'arrivée</label>
                            <input type="time" name="heure_arrivee" class="form-control" 
                                   value="{{ $pointage->heure_arrivee ? $pointage->heure_arrivee->format('H:i') : '' }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Heure de départ</label>
                            <input type="time" name="heure_depart" class="form-control" 
                                   value="{{ $pointage->heure_depart ? $pointage->heure_depart->format('H:i') : '' }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Statut</label>
                            <select name="statut" class="form-select" required>
                                <option value="présent" {{ $pointage->statut == 'présent' ? 'selected' : '' }}>Présent</option>
                                <option value="absent" {{ $pointage->statut == 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="retard" {{ $pointage->statut == 'retard' ? 'selected' : '' }}>Retard</option>
                                <option value="congé" {{ $pointage->statut == 'congé' ? 'selected' : '' }}>Congé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Justification</label>
                            <textarea name="justification" class="form-control" rows="4" 
                                      placeholder="Raison de l'absence, du retard...">{{ $pointage->justification }}</textarea>
                        </div>

                        @if($pointage->heure_arrivee && $pointage->heure_depart)
                            <div class="alert alert-info">
                                <strong>Durée calculée:</strong> 
                                {{ floor($pointage->duree_travail / 60) }}h{{ $pointage->duree_travail % 60 }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Enregistrer les modifications
                    </button>
                    <a href="{{ route('pointage.index') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-times me-1"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection