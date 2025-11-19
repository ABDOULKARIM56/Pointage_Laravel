<!-- SIDEBAR -->
<div class="bg-primary text-white shadow-sm d-none d-md-flex flex-column flex-shrink-0"
     style="width: 280px; height: 100vh;">

    <!-- Header -->
    <div class="p-3 border-bottom border-light bg-white text-primary text-center">
        <h5 class="mb-0">Saratech</h5>
        <small>Gestion d'Assiduité pour une entreprise</small>
    </div>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column mb-auto p-2" id="sidebarMenu">

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#dashboard">
                <i class="bi bi-calendar-check me-2"></i> Tableau de bord
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#employees">
                <i class="bi bi-people me-2"></i> Gestion des employés
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#attendance">
                <i class="bi bi-clock me-2"></i> Pointage
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#reports">
                <i class="bi bi-graph-up me-2"></i> Rapports
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#settings">
                <i class="bi bi-gear me-2"></i> Conditions
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#parametre">
                <i class="bi bi-building me-2"></i> Loi & Rédaction
            </a>
        </li>

        <!-- Sous-menu configuration -->
        <li class="nav-item mt-2">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#settingsSubmenu">
                <span><i class="bi bi-gear me-2"></i> Configurations</span>
                <span>▾</span>
            </a>

            <div class="collapse" id="settingsSubmenu">
                <ul class="nav flex-column ms-4 small">
                    <li class="mb-1"><a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#services"><i class="bi bi-building me-2"></i> Services</a></li>
                    <li class="mb-1"><a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#departements"><i class="bi bi-diagram-3 me-2"></i> Départements</a></li>
                    <li class="mb-1"><a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#conges"><i class="bi bi-calendar-check me-2"></i> Congés</a></li>
                    <li class="mb-1"><a class="nav-link text-white" data-bs-toggle="pill" data-bs-target="#permissions"><i class="bi bi-shield-lock me-2"></i> Permissions</a></li>
                </ul>
            </div>
        </li>
    </ul>

    <!-- Logout -->
    <div class="mt-auto border-top border-light p-3">
        <form action="{{ route('deconnexion') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light w-100 text-primary">
                <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
            </button>
        </form>
    </div>
</div>

<style>
#sidebarMenu .nav-link {
    padding: 0.55rem 1rem;
    border-radius: 0.25rem;
    transition: background-color 0.2s;
}
#sidebarMenu .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
}
#sidebarMenu .nav-link.active {
    background-color: rgba(255, 255, 255, 0.35);
    font-weight: 500;
}
</style>
