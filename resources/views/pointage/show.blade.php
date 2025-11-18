@extends('layouts.app')

@section('title', 'Détails du Pointage')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-info-circle me-2 text-primary"></i> Détails du Pointage
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pointage.index') }}">Pointage</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-calendar-day me-2"></i> Pointage du {{ $pointage->date->format('d/m/Y') }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Informations Employé</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Nom complet:</strong></td>
                            <td>{{ $pointage->employe->prenom }} {{ $pointage->employe->nom }}</td>
                        </tr>
                        <tr>
                            <td><strong>Matricule:</strong></td>
                            <td>{{ $pointage->employe->matricule }}</td>
                        </tr>
                        <tr>
                            <td><strong>Service:</strong></td>
                            <td>{{ $pointage->employe->service->nom }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Détails Pointage</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Date:</strong></td>
                            <td>{{ $pointage->date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Heure arrivée:</strong></td>
                            <td>
                                @if($pointage->heure_arrivee)
                                    <span class="badge bg-light text-dark">{{ $pointage->heure_arrivee->format('H:i') }}</span>
                                @else
                                    <span class="badge bg-secondary">Non pointé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Heure départ:</strong></td>
                            <td>
                                @if($pointage->heure_depart)
                                    <span class="badge bg-light text-dark">{{ $pointage->heure_depart->format('H:i') }}</span>
                                @else
                                    <span class="badge bg-secondary">Non pointé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Durée travail:</strong></td>
                            <td>
                                @if($pointage->duree_travail)
                                    <span class="badge bg-info">{{ floor($pointage->duree_travail / 60) }}h{{ $pointage->duree_travail % 60 }}</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <h6 class="fw-bold text-primary">Statut & Justification</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Statut:</strong>
                            @if($pointage->statut == 'présent')
                                <span class="badge bg-success ms-2">{{ $pointage->statut }}</span>
                            @elseif($pointage->statut == 'retard')
                                <span class="badge bg-warning text-dark ms-2">{{ $pointage->statut }}</span>
                            @elseif($pointage->statut == 'absent')
                                <span class="badge bg-danger ms-2">{{ $pointage->statut }}</span>
                            @else
                                <span class="badge bg-info ms-2">{{ $pointage->statut }}</span>
                            @endif
                        </div>
                        
                        @if($pointage->est_en_retard)
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-clock me-1"></i> En retard
                            </span>
                        @endif
                    </div>

                    @if($pointage->justification)
                        <div class="mt-3">
                            <strong>Justification:</strong>
                            <p class="mt-1 p-2 bg-light rounded">{{ $pointage->justification }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pointage.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
                <a href="{{ route('pointage.edit', $pointage->id) }}" class="btn btn-primary ms-2">
                    <i class="fas fa-edit me-1"></i> Modifier
                </a>
            </div>
        </div>
    </div>
</div>
@endsection