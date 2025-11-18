{{--  @extends('layouts.app')

@section('title', 'Détails de l\'Employé')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mt-4 mb-3">
                <i class="fas fa-user-circle"></i> Détails de l'Employé
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('employe.ShowEmploye') }}">Employés</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Carte principale -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="avatar-circle mx-auto mb-3" style="width: 120px; height: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 48px; color: white; font-weight: bold;">
                                {{ strtoupper(substr($employe->prenom, 0, 1)) }}{{ strtoupper(substr($employe->nom, 0, 1)) }}
                            </span>
                        </div>
                    </div>
                    <h4 class="mb-1">{{ $employe->prenom }} {{ $employe->nom }}</h4>
                    <p class="text-muted mb-2">{{ $employe->matricule }}</p>
                    
                    @if($employe->role == 'Admin')
                        <span class="badge bg-danger fs-6">{{ $employe->role }}</span>
                    @elseif($employe->role == 'Manager')
                        <span class="badge bg-warning fs-6">{{ $employe->role }}</span>
                    @else
                        <span class="badge bg-secondary fs-6">{{ $employe->role }}</span>
                    @endif

                    <hr class="my-4">

                    <div class="d-grid gap-2">
                        <a href="{{ route('employe.edit', $employe->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                        <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>

                    <form id="delete-form" action="{{ route('employe.destroy', $employe->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>

        <!-- Informations détaillées -->
        <div class="col-lg-8">
            <!-- Informations personnelles -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user"></i> Informations Personnelles</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-id-card text-primary"></i> Nom Complet:</strong><br>
                            <span class="ms-4">{{ $employe->prenom }} {{ $employe->nom }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-venus-mars text-primary"></i> Genre:</strong><br>
                            <span class="ms-4">{{ $employe->genre }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-calendar text-primary"></i> Date de Naissance:</strong><br>
                            <span class="ms-4">{{ $employe->date_naissance?->format('d/m/Y') ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-heart text-primary"></i> État Civil:</strong><br>
                            <span class="ms-4">{{ $employe->etat_civil }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-flag text-primary"></i> Nationalité:</strong><br>
                            <span class="ms-4">{{ $employe->nationalite }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-map-marker-alt text-primary"></i> Adresse:</strong><br>
                            <span class="ms-4">{{ $employe->adresse }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations de contact -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-address-book"></i> Informations de Contact</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-envelope text-success"></i> Email:</strong><br>
                            <span class="ms-4">
                                <a href="mailto:{{ $employe->email }}">{{ $employe->email }}</a>
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-phone text-success"></i> Téléphone:</strong><br>
                            <span class="ms-4">
                                <a href="tel:{{ $employe->numero }}">{{ $employe->numero }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations professionnelles -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-briefcase"></i> Informations Professionnelles</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <strong><i class="fas fa-barcode text-info"></i> Matricule:</strong><br>
                            <span class="ms-4 badge bg-dark">{{ $employe->matricule }}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong><i class="fas fa-building text-info"></i> Service:</strong><br>
                            <span class="ms-4">{{ $employe->service->nom ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong><i class="fas fa-user-tag text-info"></i> Rôle:</strong><br>
                            <span class="ms-4">{{ $employe->role }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-clock text-info"></i> Date de création:</strong><br>
                            <span class="ms-4">{{ $employe->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-sync text-info"></i> Dernière modification:</strong><br>
                            <span class="ms-4">{{ $employe->updated_at?->format('d/m/Y H:i') ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet employé ? Cette action est irréversible.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endsection --}}

@extends('layouts.app')

@section('title', 'Détails de l\'employé')

@section('content')
<div class="container-fluid px-4">

    <!-- Titre -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-id-card me-2 text-primary"></i> Détails de l'Employé
            </h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('employe.ShowEmploye') }}">Liste des Employés</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- CARD DETAIL -->
    <div class="card shadow-sm">

        <div class="card-body p-4">

            <div class="row">
                <div class="col-md-3 text-center">

                    <!-- Avatar -->
                    <div class="avatar-circle mx-auto mb-3">
                        {{ strtoupper(substr($employe->nom, 0, 1)) }}
                    </div>

                    <h4 class="fw-bold text-primary">
                        {{ $employe->prenom }} {{ $employe->nom }}
                    </h4>

                    <p class="text-muted">{{ $employe->role }}</p>

                    <a href="{{ route('employe.edit', $employe->id) }}" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-edit"></i> Modifier
                    </a>

                </div>

                <div class="col-md-9">

                    <div class="section-title">Informations Personnelles</div>
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Genre:</strong> {{ $employe->genre }}</div>
                        <div class="col-md-4"><strong>Date naissance:</strong> {{ $employe->date_naissance }}</div>
                        <div class="col-md-4"><strong>État civil:</strong> {{ $employe->etat_civil }}</div>
                        <div class="col-md-6"><strong>Nationalité:</strong> {{ $employe->nationalite }}</div>
                        <div class="col-md-6"><strong>Adresse:</strong> {{ $employe->adresse }}</div>
                    </div>

                    <div class="section-title">Contact</div>
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Email:</strong> {{ $employe->email }}</div>
                        <div class="col-md-6"><strong>Téléphone:</strong> {{ $employe->numero }}</div>
                    </div>

                    <div class="section-title">Profession</div>
                    <div class="row g-3">
                        <div class="col-md-4"><strong>Matricule:</strong> {{ $employe->matricule }}</div>
                        <div class="col-md-4"><strong>Service:</strong> {{ $employe->service->nom }}</div>
                        <div class="col-md-4"><strong>Rôle:</strong> {{ $employe->role }}</div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection