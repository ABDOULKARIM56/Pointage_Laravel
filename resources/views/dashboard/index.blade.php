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
