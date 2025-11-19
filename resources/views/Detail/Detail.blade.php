<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="bg-light p-4">

<div class="container">

    <!-- Carte de détail -->
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-info-circle"></i>
                Détails de {{ $detail->nom }}
            </h5>
        </div>

        <div class="card-body">
            <p><strong>Nom :</strong> {{ $detail->nom }}</p>
            <p><strong>Description :</strong> {{ $detail->description }}</p>

            {{-- Ajoute ici d'autres champs si nécessaires --}}
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('show_departement') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Retour
            </a>
        </div>
    </div>

</div>

</body>
</html>
