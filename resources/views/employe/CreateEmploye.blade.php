{{--  @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un Employé</h2>

    {{-- Affichage des erreurs de validation --}}
    {{--@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez corriger les erreurs suivantes :
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Message de succès --}}
    {{--@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire d’ajout --}}
    {{--<form action="{{ route('employe.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nom :</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Prénom :</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Matricule :</label>
                <input type="text" name="matricule" class="form-control" value="{{ old('matricule') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email :</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nationalité :</label>
                <input type="text" name="nationalite" class="form-control" value="{{ old('nationalite') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Genre :</label>
                <select name="genre" class="form-control" required>
                    <option value="">-- Sélectionnez --</option>
                    <option value="Masculin" {{ old('genre') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Féminin" {{ old('genre') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>État civil :</label>
                <select name="etat_civil" class="form-control" required>
                    <option value="">-- Sélectionnez --</option>
                    <option value="Célibataire" {{ old('etat_civil') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                    <option value="Marié(e)" {{ old('etat_civil') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                    <option value="Divorcé(e)" {{ old('etat_civil') == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Numéro de téléphone :</label>
                <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Adresse :</label>
                <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Service :</label>
                <select name="service_id" class="form-control" required>
                    <option value="">-- Sélectionnez un service --</option>
                    <option value="Célibataire" {{ old('etat_civil') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                    <option value="Marié(e)" {{ old('etat_civil') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                    <option value="Divorcé(e)" {{ old('etat_civil') == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option></option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Rôle :</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Sélectionnez --</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Employé" {{ old('role') == 'Employé' ? 'selected' : '' }}>Employé</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Date de naissance :</label>
                <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Mot de passe :</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success">Ajouter l’employé</button>
            <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Ajouter un Employé')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mt-4 mb-3">
                <i class="fas fa-user-plus"></i> Ajouter un Employé
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('employe.ShowEmploye') }}">Liste Des Employées</a></li>
                    
                </ol>
            </nav>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-form"></i> Formulaire d'ajout</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('employe.store') }}" method="POST">
                @csrf

                <!-- Informations personnelles -->
                <h6 class="border-bottom pb-2 mb-3">
                    <i class="fas fa-user"></i> Informations Personnelles
                </h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" 
                               value="{{ old('nom') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" 
                               value="{{ old('prenom') }}" required>
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
                            <option value="Homme" {{ old('genre') == 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme" {{ old('genre') == 'Femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                        @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date de Naissance <span class="text-danger">*</span></label>
                        <input type="date" name="date_naissance" 
                               class="form-control @error('date_naissance') is-invalid @enderror" 
                               value="{{ old('date_naissance') }}" required>
                        @error('date_naissance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">État Civil <span class="text-danger">*</span></label>
                        <select name="etat_civil" class="form-select @error('etat_civil') is-invalid @enderror" required>
                            <option value="">Sélectionnez...</option>
                            <option value="Célibataire" {{ old('etat_civil') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                            <option value="Marié(e)" {{ old('etat_civil') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                            <option value="Divorcé(e)" {{ old('etat_civil') == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                            <option value="Veuf(ve)" {{ old('etat_civil') == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
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
                               value="{{ old('nationalite') }}" required>
                        @error('nationalite')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Adresse <span class="text-danger">*</span></label>
                        <input type="text" name="adresse" 
                               class="form-control @error('adresse') is-invalid @enderror" 
                               value="{{ old('adresse') }}" required>
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
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Numéro de Téléphone <span class="text-danger">*</span></label>
                        <input type="text" name="numero" 
                               class="form-control @error('numero') is-invalid @enderror" 
                               value="{{ old('numero') }}" required>
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
                               value="{{ old('matricule') }}" required>
                        @error('matricule')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
    <label class="form-label">Service <span class="text-danger">*</span></label>
    <select name="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
        <option value="">Sélectionnez un service...</option>

        @foreach($services as $service)
            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                {{ $service->nom }}
            </option>
        @endforeach
    </select>

    @error('service_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                        <label class="form-label">Rôle <span class="text-danger">*</span></label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="">Sélectionnez un rôle...</option>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="Employé" {{ old('role') == 'Employé' ? 'selected' : '' }}>Employé</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sécurité -->
                <h6 class="border-bottom pb-2 mb-3 mt-4">
                    <i class="fas fa-lock"></i> Sécurité
                </h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" name="password" 
                               class="form-control @error('password') is-invalid @enderror" required>
                        <small class="text-muted">Minimum 8 caractères</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Boutons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                    <a href="{{ route('employe.ShowEmploye') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection