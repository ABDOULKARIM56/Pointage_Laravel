@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="tab-content">

    <div class="tab-pane fade" id="permissions">
        {{-- LOGIQUE D'AFFICHAGE CONDITIONNEL POUR LES PERMISSIONS --}}
        @if (isset($mode) && ($mode === 'create') && $activeTab === '#permissions')
            {{-- Si l'onglet actif est 'permissions' ET que le mode est 'create' ou 'edit', on affiche le formulaire --}}
            @include('Permission.CreatePermission', ['permissions' => $permissions, 'mode' => $mode])
        @elseif(isset($mode) && ($mode === 'edit') && $activeTab === '#permissions')
            @include('Permission.EditPermission', ['permissions' => $permissions, 'mode' => $mode])
            {{-- Par défaut ou si le mode est 'list', on affiche la liste --}}
        @else
            @include('Permission.ShowPermission', ['permissions' => $permissions, 'mode' => 'list'])
        @endif
    </div>

    <div class="tab-pane fade" id="services">
        {{-- LOGIQUE D'AFFICHAGE CONDITIONNEL POUR LES SERVICES --}}
        @if (isset($mode) && ($mode === 'create') && $activeTab === '#services')
            @include('Service.CreateService', ['services' => $services, 'mode' => $mode])
        @elseif(isset($mode) && ($mode === 'edit') && $activeTab === '#services')
            @include('Service.EditService', ['service' => $services, 'mode' => $mode])
        @else
            @include('Service.ShowService', ['services' => $services, 'mode' => 'list'])
        @endif
    </div>

    <div class="tab-pane fade" id="departements">
        {{-- LOGIQUE D'AFFICHAGE CONDITIONNEL POUR LES DÉPARTEMENTS --}}
        @if (isset($mode) && ($mode === 'create') && $activeTab === '#departements')
            @include('Departement.CreateDepartement', ['departements' => $departements, 'mode' => $mode])
        @elseif(isset($mode) && ($mode === 'edit') && $activeTab === '#departements')
            @include('Departement.EditDepartement', ['departement' => $departements, 'mode' => $mode])
        @else
            @include('Departement.ShowDepartement', ['departements' => $departements, 'mode' => 'list'])
        @endif
    </div>

    <div class="tab-pane fade" id="conges">
        {{-- Ici, nous conservons l'inclusion simple ou ajoutons une logique similaire si nécessaire --}}

        @if (isset($mode) && ($mode === 'create') && $activeTab === '#conges')
            @include('Conge.CreateConge', ['conges' => $conges, 'mode' => $mode])
        @elseif(isset($mode) && ($mode === 'edit') && $activeTab === '#conges')
            @include('Conge.EditConge', ['conge' => $conges, 'mode' => $mode])
        @else
            @include('Conge.ShowConge', ['conges' => $conges,'mode' => $mode])
        @endif
    </div>

</div>
@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {

    const sidebarLinks = document.querySelectorAll('#sidebarMenu .nav-link');
    const allTabs = document.querySelectorAll('.tab-pane');

    // --- Fonction d'activation et de mise à jour ---
    function activateTab(target) {
        const tabElement = document.querySelector(target);
        const linkElement = document.querySelector(`[data-bs-target="${target}"]`);

        if (tabElement && linkElement) {
            // Désactiver tous les onglets et liens existants
            allTabs.forEach(tab => tab.classList.remove('show', 'active'));
            sidebarLinks.forEach(link => link.classList.remove('active'));

            // 1. Activation du panneau Bootstrap
            tabElement.classList.add('show', 'active');

            // 2. Activation du lien de la sidebar
            linkElement.classList.add('active');

            // 3. Ouvrir le sous-menu si l'onglet y est contenu (logique de la sidebar)
            const submenu = document.getElementById('settingsSubmenu');
            if (submenu && submenu.contains(linkElement)) {
                 submenu.classList.add('show');
            }
        }
    }

    // 1. Déterminer la cible initiale (Priorité: URL Hash, puis LocalStorage, puis #services)
    // NOTE : Le hash est crucial pour revenir au bon onglet après la soumission d'un formulaire (ex: Modifier)
    const urlHash = window.location.hash;
    const savedTarget = localStorage.getItem("activeSidebarItem");

    // Si un hash est présent dans l'URL, nous l'utilisons en priorité. Sinon, on utilise l'état sauvegardé, sinon '#services'.
    let targetToActivate = urlHash || savedTarget || '#services';

    // --- Exécuter l'activation initiale ---
    activateTab(targetToActivate);

    // Si l'URL n'avait pas de hash, nous la mettons à jour pour la persistance
    if (!urlHash) {
        history.replaceState(null, null, targetToActivate);
    }

    // --- Gestion du clic (enregistrer et modifier l'URL) ---
    sidebarLinks.forEach(link => {
        // Ajouter un écouteur de clic UNIQUEMENT aux liens qui ont un data-bs-target
        if (link.dataset.bsTarget) {
            link.addEventListener('click', function (event) {
                const target = this.dataset.bsTarget; // ex: #services

                // 1. Enregistrer dans localStorage
                localStorage.setItem("activeSidebarItem", target);

                // 2. Activation immédiate (pour gérer les classes de la sidebar)
                activateTab(target);

                // 3. Mise à jour de l'URL sans rechargement (History API)
                history.pushState(null, null, target);

                // Empêcher l'action par défaut si le lien a un href="#"
                event.preventDefault();
            });
        }
    });

    // Optionnel: Gérer le bouton retour/avant du navigateur
    window.addEventListener('popstate', () => {
        const target = window.location.hash || '#services';
        activateTab(target);
    });

});
</script>
@endpush
