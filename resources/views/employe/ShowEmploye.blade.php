{{-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Liste des Employés</h2>

    {{-- ✅ Message de succès après ajout, modification ou suppression --}}
    {{--@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Formulaire de recherche --}}
    {{--<form action="{{ route('employe.ShowEmploye') }}" method="GET" class="row mb-4">
        <div class="col-md-10">
            <input type="text" name="nom" class="form-control" placeholder="Rechercher un employé par nom..." value="{{ request('nom') }}">
        </div>
        <div class="col-md-2 text-end">
            <button type="submit" class="btn btn-primary w-100">Rechercher</button>
        </div>
    </form>

    {{-- ✅ Tableau des employés --}}
    {{--<table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Nom & Prénom</th>
                <th>Matricule</th>
                <th>Email</th>
                <th>Service</th>
                <th>Rôle</th>
                <th>Date de Naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employe as $emp)
                <tr class="text-center align-middle">
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->nom }} {{ $emp->prenom }}</td>
                    <td>{{ $emp->matricule }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->service ?? '—' }}</td>
                    <td>{{ $emp->role }}</td>
                    <td>{{ $emp->date_naissance ?? '—' }}</td>
                    <td>
                        {{-- Boutons actions (tu peux les activer plus tard) --}}
                       {{-- <a href="{{ route('employe.edit', $emp->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('employe.destroy', $emp->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet employé ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Aucun employé trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="text-center mt-3">
        <a href="{{ route('employe.create') }}" class="btn btn-success">➕ Ajouter un Employé</a>
    </div>
</div>
@endsection--}}

@extends('layouts.app')

@section('title', 'Liste des Employés')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mt-4 mb-3">
                <i class="fas fa-users"></i> Gestion des Employés
            </h1>
        </div>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Filtres et bouton d'ajout -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('employe.ShowEmploye') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Rechercher</label>
                    <input type="text" name="nom" class="form-control" 
                           placeholder="Nom, prénom ou matricule..." 
                           value="{{ request('nom') }}">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Service</label>
                    <select name="service_id" class="form-select">
                        <option value="">Tous les services</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}" 
                                {{ request('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Rôle</label>
                    <select name="role" class="form-select">
                        <option value="">Tous les rôles</option>
                        <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Manager" {{ request('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                        <option value="Employé" {{ request('role') == 'Employé' ? 'selected' : '' }}>Employé</option>
                    </select>
                </div>
                
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Filtrer
                    </button>
                </div>
            </form>
            
            <div class="mt-3">
                <a href="{{ route('employe.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Ajouter un employé
                </a>
                <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Réinitialiser
                </a>
            </div>
        </div>
    </div>

    <!-- Tableau des employés -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-list"></i> Liste des Employés 
                <span class="badge bg-light text-dark">{{ $employes->count() }}</span>
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Rôle</th>
                            <th>Téléphone</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employes as $employe)
                        <tr>
                            <td><strong>{{ $employe->matricule }}</strong></td>
                            <td>
                                <i class="fas fa-user text-primary"></i>
                                {{ $employe->prenom }} {{ $employe->nom }}
                            </td>
                            <td>{{ $employe->email }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $employe->service->nom ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if($employe->role == 'Admin')
                                    <span class="badge bg-danger">{{ $employe->role }}</span>
                                @elseif($employe->role == 'Manager')
                                    <span class="badge bg-warning">{{ $employe->role }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $employe->role }}</span>
                                @endif
                            </td>
                            <td>{{ $employe->numero }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('employe.show', $employe->id) }}" 
                                       class="btn btn-sm btn-info" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('employe.edit', $employe->id) }}" 
                                       class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" 
                                            onclick="confirmDelete({{ $employe->id }})" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <!-- Form de suppression caché -->
                                <form id="delete-form-{{ $employe->id }}" 
                                      action="{{ route('employe.destroy', $employe->id) }}" 
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Aucun employé trouvé</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
