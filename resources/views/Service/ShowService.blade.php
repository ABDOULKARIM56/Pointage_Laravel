<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Services</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap et Font Awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
         th {
            background-color: #2196F3 !important;
            color: white !important;
            text-align: center;
        }

              /* Alternance correcte des lignes */
.table tbody tr:nth-child(odd) td {
    background-color: #F3F3F3 !important;
}

.table tbody tr:nth-child(even) td {
    background-color: #ffffff !important;
}

/* Survol */
.table-hover tbody tr:hover td {
    background-color: #1e6104ff !important;
    color: white !important;
    transition: 0.2s;
}

        /* Tableau avec un peu d’arrondi et d’ombre */
        table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Boutons d’action : plus petits et arrondis */
        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            border-radius: 6px;
            font-size: 0.85rem;
            padding: 4px 10px;
        }

        .btn-action i {
            font-size: 1rem;
        }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="text-center mb-4"style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Liste des Services</h2>

        <!-- 🔍 Barre de recherche + bouton d’ajout -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- cclass="d-flex w-50" -->
            <form method="GET" action="{{ route('show_service') }}" id="searchForm" class="flex-grow-1 d-flex" >
                <input 
                    type="text" 
                    name="nom" 
                    id="searchInput"
                    placeholder="🔍 Rechercher un service ou un département..."
                    value="{{ request('nom') }}" 
                    class="form-control me-2"
                >
            </form>

            <form action="{{ route('create_servi') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Ajouter
                </button>
            </form>
        </div>

        <!-- 🔁 Recherche automatique -->
        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                clearTimeout(window.searchTimeout);
                window.searchTimeout = setTimeout(() => {
                    document.getElementById('searchForm').submit();
                }, 500);
            });
        </script>

        <!-- 🧾 Tableau -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table table-bordered table-hover bg-white">
                    <tr>
                        <th>ID</th>
                        <th>Nom du Service</th>
                        <th>Département</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $servi)
                        <tr>
                            <td>{{ $servi->id }}</td>
                            <td>{{ $servi->nom }}</td>
                            <td>{{ $servi->departement?->nom ?? '—' }}</td>
                            <td class="text-center">

                                

                                <!-- ✏️ Modifier -->
                                <a href="{{ route('edit_servi', ['service' => $servi]) }}" 
                                   class="btn btn-sm btn-warning text-white mx-1"
                                   title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- 🗑️ Supprimer -->
                                <form action="{{ route('suppression_servi', ['service' => $servi]) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucun service trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination (si activée côté contrôleur) --}}
        <div class="mt-3">
            {{ $services->links() }}
        </div>
    </div>

</body>
</html>
