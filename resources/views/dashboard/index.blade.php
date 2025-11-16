{{-- Fichier : resources/views/dashboard/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <div class="tab-pane fade show active" id="dashboard">
        <h3 class="mb-4 fw-bold">📊 Tableau de bord</h3>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-primary shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Employés Présents</h6>
                        <h3 class="fw-bold">14</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Total Employés</h6>
                        <h3 class="fw-bold">32</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Congés en cours</h6>
                        <h3 class="fw-bold">3</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger shadow-sm">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Absents</h6>
                        <h3 class="fw-bold">5</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <strong>Présence en temps réel</strong>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Employé</th>
                                    <th>Heure d'arrivée</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Salimatou Diallo</td>
                                    <td>08:05</td>
                                    <td><span class="badge bg-success">Présent</span></td>
                                </tr>
                                <tr>
                                    <td>Oumar Traoré</td>
                                    <td>08:20</td>
                                    <td><span class="badge bg-success">Présent</span></td>
                                </tr>
                                <tr>
                                    <td>Hawa Barry</td>
                                    <td>—</td>
                                    <td><span class="badge bg-danger">Absent</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card text-center shadow-sm bg-primary text-white p-4">
                    <div class="card-body">
                        <h6>Date & Heure actuelle</h6>
                        <h4 id="current-date"></h4>
                        <h2 id="current-time"></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <strong>Derniers Pointages</strong>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <span><b>Diallo Salimatou</b> - Entrée</span>
                    <small>08:05 - 12/11/2025</small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span><b>Barry Hawa</b> - Sortie</span>
                    <small>17:10 - 11/11/2025</small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span><b>Traoré Oumar</b> - Entrée</span>
                    <small>08:20 - 12/11/2025</small>
                </li>
            </ul>
        </div>
    </div>

    {{-- Les autres onglets doivent être créés de la même manière dans des fichiers séparés
         (ex: employees/index.blade.php, reports/index.blade.php, etc.) --}}

    {{-- Onglet: Gestion des employés (inclus ici pour la continuité du code d'exemple) --}}
    <div class="tab-pane fade" id="employees">
        <h3 class="mb-4 fw-bold">👥 Gestion des employés</h3>
        <!-- Outils -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                ➕ Ajouter un employé
            </button>

            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Rechercher..." />
                <select class="form-select">
                    <option>Filtrer par département</option>
                    <option>Informatique</option>
                    <option>Comptabilité</option>
                    <option>Marketing</option>
                </select>
                <select class="form-select">
                    <option>Filtrer par statut</option>
                    <option>Actif</option>
                    <option>Inactif</option>
                </select>
            </div>
        </div>

        <!-- Tableau -->
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Badge ID</th>
                    <th>Nom & Prénom</th>
                    <th>Fonction</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#A102</td>
                    <td>Diallo Salimatou</td>
                    <td>Comptable</td>
                    <td><span class="badge bg-success">Actif</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                            Voir
                        </button>
                        <button class="btn btn-sm btn-warning">Modifier</button>
                        <button class="btn btn-sm btn-danger">Désactiver</button>
                    </td>
                </tr>
                <tr>
                    <td>#A103</td>
                    <td>Traoré Oumar</td>
                    <td>Technicien</td>
                    <td><span class="badge bg-success">Actif</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                            Voir
                        </button>
                        <button class="btn btn-sm btn-warning">Modifier</button>
                        <button class="btn btn-sm btn-danger">Désactiver</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Onglet: Pointage (inclus ici pour la continuité du code d'exemple) --}}
    <div class="tab-pane fade" id="attendance">
        <h3 class="mb-4 fw-bold">🕐 Pointage</h3>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#manualPointageModal">
            ⏱️ Pointage Manuel
        </button>

        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th>Badge</th>
                    <th>Employé</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#A102</td>
                    <td>Diallo Salimatou</td>
                    <td>12/11/2025</td>
                    <td>08:05</td>
                    <td>Entrée</td>
                </tr>
                <tr>
                    <td>#A103</td>
                    <td>Traoré Oumar</td>
                    <td>12/11/2025</td>
                    <td>08:20</td>
                    <td>Entrée</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Onglet: Rapports (inclus ici pour la continuité du code d'exemple) --}}
    <div class="tab-pane fade" id="reports">
        <h3 class="mb-4 fw-bold">📈 Rapports</h3>
        <h3 class="mb-4 fw-bold">📈 Rapports d'Assiduité</h3>

        <p class="text-muted">
            Générez des analyses détaillées, filtrez par période, département ou statut, et exportez les données pour
            l'audit et la paie.
        </p>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">🛠️ Options de Filtrage & Exportation</h5>

                {{-- Formulaire de Filtre (Simulation d'une requête Laravel) --}}
                <form action="{{-- {{ route('reports.generate') }} --}}" method="GET" class="row g-3 align-items-end mb-4">

                    {{-- Filtre 1: Période (Mois, Semaine, etc.) --}}
                    <div class="col-md-3">
                        <label for="filter-period" class="form-label">Filtrer par Période :</label>
                        <select class="form-select" id="filter-period" name="period">
                            <option value="current_month" selected>Ce Mois</option>
                            <option value="last_month">Mois Dernier</option>
                            <option value="last_7_days">7 Derniers Jours</option>
                            <option value="custom">Période Personnalisée (Date)</option>
                        </select>
                    </div>

                    {{-- Filtre 2: Département --}}
                    <div class="col-md-3">
                        <label for="filter-department" class="form-label">Par Département :</label>
                        <select class="form-select" id="filter-department" name="department_id">
                            <option value="">Tous les Départements</option>
                            {{-- Boucle Laravel pour les départements --}}
                            <option value="1">Informatique</option>
                            <option value="2">Comptabilité</option>
                            <option value="3">Marketing</option>
                        </select>
                    </div>

                    {{-- Filtre 3: Statut d'Emploi --}}
                    <div class="col-md-3">
                        <label for="filter-status" class="form-label">Statut Employé :</label>
                        <select class="form-select" id="filter-status" name="work_status">
                            <option value="">Tous les Actifs</option>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                            <option value="on_leave">En Congé</option>
                        </select>
                    </div>

                    {{-- Bouton d'application du filtre --}}
                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-info text-white">
                            <i class="fas fa-search"></i> 🔍 Afficher le Rapport
                        </button>
                    </div>
                </form>

                <hr>

                {{-- Boutons d'Action (Exportation) --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{-- {{ route('reports.export', ['format' => 'csv']) }} --}}" class="btn btn-success">
                        <i class="fas fa-file-csv"></i> Exporter CSV
                    </a>
                    <a href="{{-- {{ route('reports.export', ['format' => 'pdf']) }} --}}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Exporter PDF
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Résultats : Période du 1er au 30 Novembre 2025</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 25%">Employé</th>
                            <th style="width: 20%">Département</th>
                            <th style="width: 15%">Total Jours</th>
                            <th style="width: 20%">Total Heures</th>
                            <th style="width: 20%">Heures Supplémentaires</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Boucle Laravel pour afficher les résultats --}}
                        {{-- @foreach ($dataRapport as $item) --}}
                        <tr>
                            <td>Diallo Salimatou</td>
                            <td>Comptabilité</td>
                            <td>20</td>
                            <td>38h 45m</td> {{-- Format amélioré --}}
                            <td>2h 45m</td>
                        </tr>
                        <tr>
                            <td>Traoré Oumar</td>
                            <td>Informatique</td>
                            <td>22</td>
                            <td>40h 00m</td>
                            <td>0h 00m</td>
                        </tr>
                        <tr>
                            <td>Barry Hawa</td>
                            <td>Marketing</td>
                            <td>18</td>
                            <td>35h 20m</td>
                            <td>0h 00m</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white">
                <small class="text-muted">Affichage de 3 des 32 employés correspondant aux filtres.</small>
            </div>
        </div>
    </div>

    {{-- Onglet: Paramètres (inclus ici pour la continuité du code d'exemple) --}}
    <!-- ===== Condition ===== -->
    <div class="tab-pane fade" id="settings">
        <h3 class="fw-bold mb-4">🔧 Configurations de l'entreprise</h3>

        <div class="row g-4">
            <!-- Horaires de travail -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold bg-white">
                        ⏰ Horaires de travail
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Heure de début</span>
                                <span class="fw-bold">08:00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Pause</span>
                                <span class="fw-bold">12:30</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Reprise</span>
                                <span class="fw-bold">13:30</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Heure de fin</span>
                                <span class="fw-bold">17:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Jours ouvrables -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold bg-white">
                        📅 Jours ouvrables
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Lundi ✔</li>
                                    <li class="list-group-item">Mardi ✔</li>
                                    <li class="list-group-item">Mercredi ✔</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Jeudi ✔</li>
                                    <li class="list-group-item">Vendredi ✔</li>
                                    <li class="list-group-item">Samedi ✖</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Retards & Tolérances -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold bg-white">
                        ⏳ Retards & Tolérances
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tolérance de retard</span>
                                <span class="fw-bold">10 minutes</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Sanction après</span>
                                <span class="fw-bold">3 retards</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Type de sanction</span>
                                <span class="fw-bold">Avertissement écrit</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Conditions & Réglement intérieur -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold bg-white">
                        📘 Conditions & règlements
                    </div>
                    <div class="card-body">
                        <p class="mb-2"><strong>Conditions :</strong></p>
                        <p class="text-muted small">
                            L’employé doit respecter les horaires de travail et se
                            conformer aux règles internes.
                        </p>

                        <p class="mb-2"><strong>Obligations :</strong></p>
                        <p class="text-muted small">
                            Le port du badge professionnel est obligatoire pour accéder
                            aux locaux.
                        </p>

                        <p class="mb-2"><strong>Sanctions :</strong></p>
                        <p class="text-muted small">
                            En cas de retards répétés, une sanction administrative peut
                            être appliquée.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">🏢 Services</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                Informatique
                                <span class="badge bg-primary">15 employés</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                Comptabilité
                                <span class="badge bg-primary">08 employés</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                Marketing
                                <span class="badge bg-primary">05 employés</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fonctions -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">💼 Fonctions</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Technicien</li>
                            <li class="list-group-item">Comptable</li>
                            <li class="list-group-item">Chef de Service</li>
                            <li class="list-group-item">Superviseur</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Départements -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">🏛️ Départements</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Ressources Humaines</li>
                            <li class="list-group-item">Informatique</li>
                            <li class="list-group-item">Administration</li>
                            <li class="list-group-item">Communication</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="parametre">
        <div class="tab-content mt-3" id="settingsTabContent">
            <div class="tab-pane fade show active" id="services">
                <h4>🛠️ Configurations</h4>              
                <h3 class="fw-bold mb-4">🔧 Configurations de l'entreprise</h3>

                <div class="row g-4">
                    <!-- Horaires -->
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header fw-bold bg-white">
                                ⏰ Horaires de travail
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Heure de début</label>
                                        <input type="time" class="form-control" value="08:00" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Heure de pause</label>
                                        <input type="time" class="form-control" value="12:30" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Heure de reprise</label>
                                        <input type="time" class="form-control" value="13:30" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Heure de fin</label>
                                        <input type="time" class="form-control" value="17:00" />
                                    </div>

                                    <button class="btn btn-primary w-100">
                                        Enregistrer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Jours ouvrables -->
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header fw-bold bg-white">
                                📅 Jours ouvrables
                            </div>
                            <div class="card-body">
                                <form class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked />
                                            <label class="form-check-label">Lundi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked />
                                            <label class="form-check-label">Mardi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked />
                                            <label class="form-check-label">Mercredi</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked />
                                            <label class="form-check-label">Jeudi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked />
                                            <label class="form-check-label">Vendredi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" />
                                            <label class="form-check-label">Samedi</label>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100">
                                            Enregistrer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Retard et Tolerance -->
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header fw-bold bg-white">
                                ⏳ Retards & Tolérances
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Tolérance (minutes)</label>
                                        <input type="number" class="form-control" value="10" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sanction automatique après X retards</label>
                                        <input type="number" class="form-control" value="3" />
                                    </div>

                                    <button class="btn btn-primary w-100">
                                        Enregistrer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Conditions & obligations -->
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header fw-bold bg-white">
                                📘 Conditions, obligations & sanctions
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Conditions de travail</label>
                                        <textarea class="form-control" rows="2">
    Respect de l’horaire...</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Obligations</label>
                                        <textarea class="form-control" rows="2">
    Badge obligatoire...</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sanctions</label>
                                        <textarea class="form-control" rows="2">
    Avertissement après 3 retards...</textarea>
                                    </div>

                                    <button class="btn btn-primary w-100">
                                        Enregistrer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white fw-bold">🏢 Services</div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        Informatique
                                        <span class="badge bg-primary">15 employés</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        Comptabilité
                                        <span class="badge bg-primary">8 employés</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        Marketing
                                        <span class="badge bg-primary">5 employés</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Fonctions -->
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white fw-bold">💼 Fonctions</div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Technicien</li>
                                    <li class="list-group-item">Comptable</li>
                                    <li class="list-group-item">Chef de Service</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Départements -->
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white fw-bold">
                                🏛️ Départements
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Ressources Humaines</li>
                                    <li class="list-group-item">Informatique</li>
                                    <li class="list-group-item">Administration</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Injection du script JS spécifique à cette page --}}
@push('scripts')
    <script>
        function updateDateTime() {
            const dateElement = document.getElementById("current-date");
            const timeElement = document.getElementById("current-time");

            // Créer un objet Date
            const now = new Date();

            // Format de la date (ex : Mardi 12 Novembre 2025)
            const optionsDate = {
                weekday: "long",
                day: "numeric",
                month: "long",
                year: "numeric",
            };
            const formattedDate = now.toLocaleDateString("fr-FR", optionsDate);

            // Format de l’heure (ex : 14:32:10)
            const formattedTime = now
                .toLocaleTimeString("fr-FR", {
                    hour12: false,
                    hour: "2-digit",
                    minute: "2-digit",
                    second: "2-digit",
                })
                .replace(/\./g, ":"); // correction pour certains navigateurs

            // Injecter dans le HTML
            dateElement.textContent = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
            timeElement.textContent = formattedTime;
        }

        // Mise à jour immédiate
        updateDateTime();

        // Rafraîchir chaque seconde
        setInterval(updateDateTime, 1000);
    </script>
@endpush
