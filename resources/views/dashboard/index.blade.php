@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="tab-content">

    <div class="tab-pane fade" id="permissions">
        @include('Permission.Permission', ['permissions' => $permissions,'mode' => $mode])
    </div>

    <div class="tab-pane fade" id="services">
        @include('Service.service', ['services' => $services,'mode' => $mode])
    </div>

    <div class="tab-pane fade" id="departements">
        @include('Departement.departement', ['departements' => $departements,'mode' => $mode])
    </div>

    <div class="tab-pane fade" id="conges">
        @include('Conge.conge', ['conges' => $conges,'mode' => $mode])
    </div>

</div>
@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {

    const sidebarLinks = document.querySelectorAll('#sidebarMenu .nav-link');
    const allTabs = document.querySelectorAll('.tab-pane');

    // Charger dernier onglet
    const savedTarget = localStorage.getItem("activeSidebarItem");

    if (savedTarget) {

        // Activation tab-pane
        allTabs.forEach(tab => {
            if ('#' + tab.id === savedTarget) {
                tab.classList.add('show', 'active');
            } else {
                tab.classList.remove('show', 'active');
            }
        });

        // Activation lien sidebar
        sidebarLinks.forEach(link => {
            if (link.dataset.bsTarget === savedTarget) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Lors du clic sur un lien
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function () {

            const target = this.dataset.bsTarget;

            // Enregistrer dans localStorage
            localStorage.setItem("activeSidebarItem", target);

            // Activer tab
            allTabs.forEach(tab => {
                if ("#" + tab.id === target) {
                    tab.classList.add('show', 'active');
                } else {
                    tab.classList.remove('show', 'active');
                }
            });

            // Activer lien
            sidebarLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

});
</script>

@endpush
