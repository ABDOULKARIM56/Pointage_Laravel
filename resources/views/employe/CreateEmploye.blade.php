@extends('layouts.app')

@section('title', 'Ajouter un Employé')

@section('content')
<div class="container-fluid px-4">

    <!-- Titre + breadcrumb -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold mt-4">
                <i class="fas fa-user-plus me-2 text-primary"></i> Ajouter un Employé
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white shadow-sm px-3 py-2 rounded">
                    <li class="breadcrumb-item">
                        <a href="{{ route('employe.ShowEmploye') }}">Liste des Employés</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- CARD FORM -->
    <div class="card card-custom">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i> Formulaire d'ajout</h5>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('employe.store') }}" method="POST">
                @csrf

                <!-- Informations personnelles -->
                <div class="section-title mt-3">Informations Personnelles</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nom *</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                               value="{{ old('nom') }}" required>
                        @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Prénom *</label>
                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                               value="{{ old('prenom') }}" required>
                        @error('prenom') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Genre *</label>
                        <select name="genre" class="form-select @error('genre') is-invalid @enderror" required>
                            <option value="">Sélectionnez...</option>
                            <option value="Homme" {{ old('genre')=='Homme'?'selected':'' }}>Homme</option>
                            <option value="Femme" {{ old('genre')=='Femme'?'selected':'' }}>Femme</option>
                        </select>
                        @error('genre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Date de naissance *</label>
                        <input type="date" name="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror"
                               value="{{ old('date_naissance') }}" required>
                        @error('date_naissance') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">État civil *</label>
                        <select name="etat_civil" class="form-select @error('etat_civil') is-invalid @enderror" required>
                            <option value="">Sélectionnez...</option>
                            <option value="Célibataire" {{ old('etat_civil')=='Célibataire'?'selected':'' }}>Célibataire</option>
                            <option value="Marié(e)" {{ old('etat_civil')=='Marié(e)'?'selected':'' }}>Marié(e)</option>
                            <option value="Divorcé(e)" {{ old('etat_civil')=='Divorcé(e)'?'selected':'' }}>Divorcé(e)</option>
                            <option value="Veuf(ve)" {{ old('etat_civil')=='Veuf(ve)'?'selected':'' }}>Veuf(ve)</option>
                        </select>
                        @error('etat_civil') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nationalité *</label>
                        <select name="nationalite" class="form-select @error('nationalite') is-invalid @enderror" required>
                            <option value="">-- Sélectionnez une nationalité --</option>
                            <option value="Nigérienne" {{ old('nationalite')=='Nigérienne'?'selected':'' }}>Nigérienne</option>
                            <option value="Béninoise" {{ old('nationalite')=='Béninoise'?'selected':'' }}>Béninoise</option>
                            <option value="Burkinabé" {{ old('nationalite')=='Burkinabé'?'selected':'' }}>Burkinabé</option>
                            <option value="Malienne" {{ old('nationalite')=='Malienne'?'selected':'' }}>Malienne</option>
                            <option value="Sénégalaise" {{ old('nationalite')=='Sénégalaise'?'selected':'' }}>Sénégalaise</option>
                            <option value="Ivoirienne" {{ old('nationalite')=='Ivoirienne'?'selected':'' }}>Ivoirienne</option>
                            <option value="Togolaise" {{ old('nationalite')=='Togolaise'?'selected':'' }}>Togolaise</option>
                            <option value="Ghanaéenne" {{ old('nationalite')=='Ghanaéenne'?'selected':'' }}>Ghanaéenne</option>
                            <option value="Guinéenne" {{ old('nationalite')=='Guinéenne'?'selected':'' }}>Guinéenne</option>
                            <option value="Camerounaise" {{ old('nationalite')=='Camerounaise'?'selected':'' }}>Camerounaise</option>
                            <option value="Nigériane" {{ old('nationalite')=='Nigériane'?'selected':'' }}>Nigériane</option>
                            <option value="Tchadienne" {{ old('nationalite')=='Tchadienne'?'selected':'' }}>Tchadienne</option>
                            <option value="Congolaise (RDC)" {{ old('nationalite')=='Congolaise (RDC)'?'selected':'' }}>Congolaise (RDC)</option>
                            <option value="Congolaise (Congo)" {{ old('nationalite')=='Congolaise (Congo)'?'selected':'' }}>Congolaise (Congo)</option>
                            <option value="Gambienne" {{ old('nationalite')=='Gambienne'?'selected':'' }}>Gambienne</option>
                            <option value="Mauritanienne" {{ old('nationalite')=='Mauritanienne'?'selected':'' }}>Mauritanienne</option>
                            <option value="Marocaine" {{ old('nationalite')=='Marocaine'?'selected':'' }}>Marocaine</option>
                            <option value="Algérienne" {{ old('nationalite')=='Algérienne'?'selected':'' }}>Algérienne</option>
                            <option value="Tunisienne" {{ old('nationalite')=='Tunisienne'?'selected':'' }}>Tunisienne</option>
                            <option value="Égyptienne" {{ old('nationalite')=='Égyptienne'?'selected':'' }}>Égyptienne</option>
                            <option value="Française" {{ old('nationalite')=='Française'?'selected':'' }}>Française</option>
                            <option value="Belge" {{ old('nationalite')=='Belge'?'selected':'' }}>Belge</option>
                            <option value="Suisse" {{ old('nationalite')=='Suisse'?'selected':'' }}>Suisse</option>
                            <option value="Allemande" {{ old('nationalite')=='Allemande'?'selected':'' }}>Allemande</option>
                            <option value="Espagnole" {{ old('nationalite')=='Espagnole'?'selected':'' }}>Espagnole</option>
                            <option value="Portugaise" {{ old('nationalite')=='Portugaise'?'selected':'' }}>Portugaise</option>
                            <option value="Italienne" {{ old('nationalite')=='Italienne'?'selected':'' }}>Italienne</option>
                            <option value="Néerlandaise" {{ old('nationalite')=='Néerlandaise'?'selected':'' }}>Néerlandaise</option>
                            <option value="Britannique" {{ old('nationalite')=='Britannique'?'selected':'' }}>Britannique</option>
                            <option value="Américaine" {{ old('nationalite')=='Américaine'?'selected':'' }}>Américaine</option>
                            <option value="Canadienne" {{ old('nationalite')=='Canadienne'?'selected':'' }}>Canadienne</option>
                            <option value="Brésilienne" {{ old('nationalite')=='Brésilienne'?'selected':'' }}>Brésilienne</option>
                            <option value="Chinoise" {{ old('nationalite')=='Chinoise'?'selected':'' }}>Chinoise</option>
                            <option value="Indienne" {{ old('nationalite')=='Indienne'?'selected':'' }}>Indienne</option>
                            <option value="Turque" {{ old('nationalite')=='Turque'?'selected':'' }}>Turque</option>
                            <option value="Japonaise" {{ old('nationalite')=='Japonaise'?'selected':'' }}>Japonaise</option>
                        </select>
                        @error('nationalite') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Adresse *</label>
                        <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror"
                               value="{{ old('adresse') }}" required>
                        @error('adresse') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Contact -->
                <div class="section-title mt-4">Informations de Contact</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Téléphone *</label>
                        <input type="numbre" name="numero" class="form-control @error('numero') is-invalid @enderror"
                               value="{{ old('numero') }}" required>
                        @error('numero') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Professionnelles -->
                <div class="section-title mt-4">Informations Professionnelles</div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Matricule *</label>
                        <input type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror"
                               value="{{ old('matricule') }}" required>
                        @error('matricule') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Service *</label>
                        <select name="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                            <option value="">Sélectionnez...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id')==$service->id?'selected':'' }}>
                                    {{ $service->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Rôle *</label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="">Sélectionnez...</option>
                            <option value="Admin" {{ old('role')=='Admin'?'selected':'' }}>Admin</option>
                            <option value="Manager" {{ old('role')=='Manager'?'selected':'' }}>Manager</option>
                            <option value="Employé" {{ old('role')=='Employé'?'selected':'' }}>Employé</option>
                        </select>
                        @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="section-title mt-4">Sécurité</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Mot de passe *</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        <small class="text-muted">Minimum 8 caractères</small>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Boutons -->
                <div class="mt-4">
                    <button class="btn btn-primary btn-rounded">
                        <i class="fas fa-save me-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-light border btn-rounded ms-2">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
