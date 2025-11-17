<!-- SIDEBAR -->
<div class="bg-primary text-white shadow-sm d-none d-md-flex flex-column flex-shrink-0" style="width: 280px; height: 100vh;">

    <!-- Header -->
    <div class="p-3 border-bottom border-light bg-white">
        <h5 class="mb-0 text-center text-primary">Saratech</h5>
        <small class="text-primary d-block text-center">Gestion d'Assiduité pour une entreprise</small>
    </div>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column mb-auto p-2" id="sidebarMenu">

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white active cursor-pointer" data-bs-toggle="pill" data-bs-target="#dashboard" role="tab">
                <i class="bi bi-calendar-check me-2"></i> Tableau de bord
            </a>
        </li>

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#employees" role="tab">
                <i class="bi bi-people me-2"></i> Gestion des employés
            </a>
        </li>

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#attendance" role="tab">
                <i class="bi bi-clock me-2"></i> Pointage
            </a>
        </li>

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#reports" role="tab">
                <i class="bi bi-graph-up me-2"></i> Rapports
            </a>
        </li>

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#settings" role="tab">
                <i class="bi bi-gear me-2"></i> Conditions
            </a>
        </li>

        <li class="nav-item mb-1 cursor-pointer">
            <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#parametre" role="tab">
                <i class="bi bi-building me-2"></i> Loi & Rédaction
            </a>
        </li>

        <!-- Paramètres avec sous-menu -->
        <li class="nav-item mt-2">
            <a class="nav-link text-white d-flex justify-content-between align-items-center cursor-pointer" 
               data-bs-toggle="collapse" href="#settingsSubmenu" role="button" aria-expanded="false">
                <span><i class="bi bi-gear me-2"></i> Configurations</span>
                <span>▾</span>
            </a>

            <div class="collapse ps-4" id="settingsSubmenu">
                <ul class="nav flex-column small">
                    <li class="mb-1 cursor-pointer">
                        <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#services" role="tab">
                            <i class="bi bi-building me-2"></i> Services
                        </a>
                    </li>

                    <li class="mb-1 cursor-pointer">
                        <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#departments" role="tab">
                            <i class="bi bi-diagram-3 me-2"></i> Départements
                        </a>
                    </li>

                    <li class="mb-1 cursor-pointer">
                        <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#roles" role="tab">
                            <i class="bi bi-calendar-check me-2"></i> Congés
                        </a>
                    </li>

                    <li class="mb-1 cursor-pointer">
                        <a class="nav-link text-white cursor-pointer" data-bs-toggle="pill" data-bs-target="#leaves" role="tab">
                            <i class="bi bi-shield-lock me-2"></i> Permissions
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <!-- Déconnexion -->
    <div class="mt-auto border-top border-light p-3">
        <form action="{{ route('deconnexion') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light w-100 text-primary cursor-pointer">
                <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
            </button>
        </form>
    </div>
</div>

<!-- JAVASCRIPT pour gérer la sélection active -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const sidebarLinks = document.querySelectorAll('#sidebarMenu .nav-link');

    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Retirer active de tous les liens
            sidebarLinks.forEach(l => l.classList.remove('active'));

            // Ajouter active au lien cliqué
            this.classList.add('active');

            // Récupérer la cible
            const targetId = this.getAttribute('data-bs-target');
            console.log("Lien sélectionné :", targetId);
        });
    });
});
</script>
<style>
/* Chaque lien de la sidebar devient une ligne avec fond au survol */
#sidebarMenu .nav-link {
    padding: 0.5rem 1rem;       /* Espacement interne pour ressembler à des lignes */
    border-radius: 0.25rem;     /* Bords légèrement arrondis */
    transition: background-color 0.2s; /* Animation au survol */
}

#sidebarMenu .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Survol légèrement plus clair */
}

#sidebarMenu .nav-link.active {
    background-color: rgba(255, 255, 255, 0.3); /* Ligne active plus visible */
    font-weight: 500;
}
</style>
