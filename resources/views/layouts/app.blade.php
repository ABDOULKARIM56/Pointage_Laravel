<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- Permet de définir le titre par page --}}
    <title>TechNiger - @yield('title', 'Système de Pointage')</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    {{-- On peut ajouter des styles spécifiques ici si besoin --}}
</head>

<body class="bg-primary bg-opacity-10">
    <div class="d-flex vh-100">
        
        {{-- Inclusion de la barre de navigation latérale --}}
        @include('partials.sidebar')

        <div class="flex-grow-1 overflow-auto p-4 tab-content">
            @yield('content')
        </div>
        
    </div>

    {{-- Inclusion des fenêtres modales qui sont utilisées globalement --}}
    @include('partials.modals')

    {{-- Scripts JS de base --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Permet d'injecter des scripts spécifiques à la fin du body --}}
    @stack('scripts') 
</body>

</html>