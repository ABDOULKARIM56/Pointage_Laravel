<div class="bg-white shadow-sm d-none d-md-flex flex-column flex-shrink-0" style="width: 280px">
    <div class="p-3 border-bottom">
        <h5 class="text-primary mb-0 text-center">Saratech</h5>
        <small class="text-muted">Gestion d'Assiduité pour une entreprise</small>
    </div>

    {{-- Les liens de la Sidebar --}}
    <ul class="nav nav-pills flex-column mb-auto p-2" id="sidebarMenu">
        {{-- Remarque : En production, vous utiliseriez des liens Laravel Route:: pour la navigation --}}
        <li class="nav-item cursor-pointer">
            <a class="nav-link active" data-bs-toggle="pill" data-bs-target="#dashboard" role="tab">📊 Tableau de bord</a>
        </li>
        <li class="nav-item cursor-pointer">
            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#employees" role="tab">👥 Gestion des employés</a>
        </li>
        <li class="nav-item cursor-pointer">
            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#attendance" role="tab">🕐 Pointage</a>
        </li>
        <li>
            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#reports" role="tab">📈 Rapports</a>
        </li>
        <li>
            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#settings" role="tab">⚙️ Paramètres</a>
        </li>
    </ul>

    <div class="mt-auto border-top p-3">
        <button class="btn btn-danger w-100">🚪 Déconnexion</button>
    </div>
</div>