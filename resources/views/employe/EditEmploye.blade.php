{{-- @extends('layouts.app')

@section('title', 'Modifier l\'Employé')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mt-4 mb-3">
                <i class="fas fa-user-edit"></i> Modifier l'Employé
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('employe.ShowEmploye') }}">Employés</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <!-- Formulaire de modification -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0"><i class="fas fa-edit"></i> Modifier les Informations</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employe.update', $employe->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Informations personnelles -->
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-user"></i> Informations Personnelles
                        </h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" 
                                       value="{{ old('nom', $employe->nom) }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" 
                                       value="{{ old('prenom', $employe->prenom) }}" required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Genre <span class="text-danger">*</span></label>
                                <select name="genre" class="form-select @error('genre') is-invalid @enderror" required>
                                    <option value="">Sélectionnez...</option>
                                    <option value="Homme" {{ old('genre', $employe->genre) == 'Homme' ? 'selected' : '' }}>Homme</option>
                                    <option value="Femme" {{ old('genre', $employe->genre) == 'Femme' ? 'selected' : '' }}>Femme</option>
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date de Naissance <span class="text-danger">*</span></label>
                                <input type="date" name="date_naissance" 
                                       class="form-control @error('date_naissance') is-invalid @enderror" 
                                       value="{{ old('date_naissance', $employe->date_naissance?->format('Y-m-d')) }}" required>
                                @error('date_naissance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">État Civil <span class="text-danger">*</span></label>
                                <select name="etat_civil" class="form-select @error('etat_civil') is-invalid @enderror" required>
                                    <option value="">Sélectionnez...</option>
                                    <option value="Célibataire" {{ old('etat_civil', $employe->etat_civil) == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                    <option value="Marié(e)" {{ old('etat_civil', $employe->etat_civil) == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                                    <option value="Divorcé(e)" {{ old('etat_civil', $employe->etat_civil) == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                                    <option value="Veuf(ve)" {{ old('etat_civil', $employe->etat_civil) == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                                </select>
                                @error('etat_civil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nationalité <span class="text-danger">*</span></label>
                                <input type="text" name="nationalite" 
                                       class="form-control @error('nationalite') is-invalid @enderror" 
                                       value="{{ old('nationalite', $employe->nationalite) }}" required>
                                @error('nationalite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Adresse <span class="text-danger">*</span></label>
                                <input type="text" name="adresse" 
                                       class="form-control @error('adresse') is-invalid @enderror" 
                                       value="{{ old('adresse', $employe->adresse) }}" required>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Informations de contact -->
                        <h6 class="border-bottom pb-2 mb-3 mt-4">
                            <i class="fas fa-address-book"></i> Informations de Contact
                        </h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $employe->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Numéro de Téléphone <span class="text-danger">*</span></label>
                                <input type="text" name="numero" 
                                       class="form-control @error('numero') is-invalid @enderror" 
                                       value="{{ old('numero', $employe->numero) }}" required>
                                @error('numero')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Informations professionnelles -->
                        <h6 class="border-bottom pb-2 mb-3 mt-4">
                            <i class="fas fa-briefcase"></i> Informations Professionnelles
                        </h6>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Matricule <span class="text-danger">*</span></label>
                                <input type="text" name="matricule" 
                                       class="form-control @error('matricule') is-invalid @enderror" 
                                       value="{{ old('matricule', $employe->matricule) }}" required>
                                @error('matricule')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Service <span class="text-danger">*</span></label>
                                <select name="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                    <option value="">Sélectionnez un service...</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" 
                                            {{ old('service_id', $employe->service_id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->nom }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Rôle <span class="text-danger">*</span></label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">Sélectionnez un rôle...</option>
                                    <option value="Admin" {{ old('role', $employe->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Manager" {{ old('role', $employe->role) == 'Manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="Employé" {{ old('role', $employe->role) == 'Employé' ? 'selected' : '' }}>Employé</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Mettre à jour
                            </button>
                            <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Carte pour changer le mot de passe -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="fas fa-key"></i> Changer le Mot de Passe</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employe.password.update', $employe->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" required>
                            <small class="text-muted">Minimum 8 caractères</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-lock"></i> Changer le mot de passe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Modifier un Employé')

@section('content')
<div class="container-fluid px-4">

    <!-- Titre -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-user-edit me-2 text-primary"></i> Modifier l'Employé
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('employe.ShowEmploye') }}">Liste des Employés</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- CARD FORM -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-pen me-2"></i> Modifier l'Employé</h5>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('employe.update', $employe->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Informations personnelles -->
                <div class="section-title">Informations Personnelles</div>
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nom *</label>
                        <input type="text" name="nom" class="form-control" value="{{ $employe->nom }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Prénom *</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $employe->prenom }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Genre *</label>
                        <select name="genre" class="form-select" required>
                            <option value="Homme" {{ $employe->genre=='Homme'?'selected':'' }}>Homme</option>
                            <option value="Femme" {{ $employe->genre=='Femme'?'selected':'' }}>Femme</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Date de naissance *</label>
                        <input type="date" name="date_naissance" class="form-control"
                               value="{{ $employe->date_naissance }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">État civil *</label>
                        <select name="etat_civil" class="form-select">
                            <option value="Célibataire" {{ $employe->etat_civil=='Célibataire'?'selected':'' }}>Célibataire</option>
                            <option value="Marié(e)" {{ $employe->etat_civil=='Marié(e)'?'selected':'' }}>Marié(e)</option>
                            <option value="Divorcé(e)" {{ $employe->etat_civil=='Divorcé(e)'?'selected':'' }}>Divorcé(e)</option>
                            <option value="Veuf(ve)" {{ $employe->etat_civil=='Veuf(ve)'?'selected':'' }}>Veuf(ve)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nationalité *</label>
                        <input type="text" name="nationalite" class="form-control" value="{{ $employe->nationalite }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Adresse *</label>
                        <input type="text" name="adresse" class="form-control" value="{{ $employe->adresse }}" required>
                    </div>
                </div>

                <!-- Contact -->
                <div class="section-title">Informations de Contact</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email" name="email" class="form-control" value="{{ $employe->email }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Téléphone *</label>
                        <input type="text" name="numero" class="form-control" value="{{ $employe->numero }}" required>
                    </div>
                </div>

                <!-- Profession -->
                <div class="section-title">Informations Professionnelles</div>
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Matricule *</label>
                        <input type="text" name="matricule" class="form-control" value="{{ $employe->matricule }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Service *</label>
                        <select name="service_id" class="form-select">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ $employe->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Rôle *</label>
                        <select name="role" class="form-select">
                            <option value="Admin" {{ $employe->role=='Admin'?'selected':'' }}>Admin</option>
                            <option value="Manager" {{ $employe->role=='Manager'?'selected':'' }}>Manager</option>
                            <option value="Employé" {{ $employe->role=='Employé'?'selected':'' }}>Employé</option>
                        </select>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="mt-4">
                    <button class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Enregistrer les modifications
                    </button>

                    <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection