{{-- Fichier : resources/views/dashboard/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <div class="tab-content">
    <!-- <div class="tab-pane fade show active" id="permissions">
        @include('Permission.Permission', ['permissions' => $permissions,'mode' => $mode])
    </div> -->
    <div class="tab-pane fade show active" id="services">
        @include('Service.service', ['services' => $services,'mode' => $mode])
    </div>
     <div class="tab-pane fade show active" id="departements">
        @include('Departement.departement', ['departements' => $departements,'mode' => $mode])
    </div>
     <div class="tab-pane fade show active" id="conges">
        @include('Conge.conge', ['conges' => $conges,'mode' => $mode])
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
