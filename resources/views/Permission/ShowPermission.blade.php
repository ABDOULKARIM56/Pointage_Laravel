<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Permissions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Icônes Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

     <style>
        /* En-têtes du tableau */
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

        <!-- Titre -->
        <h2 class="mb-4 text-center" style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Liste des Permissions</h2>

        <!-- Barre recherche + bouton Ajouter -->
        <div class="d-flex mb-4 gap-2">
            <!-- Recherche -->
            <form method="GET" action="{{ route('show_permission') }}" class="flex-grow-1 d-flex" id="searchForm">
                <input 
                    type="text" 
                    name="type" 
                    placeholder="🔍 Rechercher une permission..." 
                    value="{{ request('type') }}" 
                    class="form-control" 
                    id="searchInput"
                />
            </form>

            <!-- Ajouter -->
            <form action="{{ route('create_permi') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-plus-circle"></i> Ajouter
                </button>
            </form>
        </div>

        <!-- Tableau -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permi)
                        <tr>
                            <td>{{ $permi->id }}</td>
                            <td>{{ $permi->type }}</td>
                            <td class="d-flex gap-2 justify-content-center">

                             

                                <!-- Modifier -->
                                <form action="{{ route('edit_permi', ['id' => $permi->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm btn-action text-white">
                                        <i class="bi bi-pencil-square"></i> 
                                    </button>
                                </form>

                                <!-- Supprimer -->
                                <form action="{{ route('suppression_permi', ['id' => $permi->id]) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette permission ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm btn-action">
                                        <i class="bi bi-trash3"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $permissions->links() }}
        </div>

    </div>

    <!-- Script : recherche automatique -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('input', function() {
            clearTimeout(window.searchTimeout);
            window.searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500); // 0,5s après la dernière frappe
        });
    </script>
</body>
</html>
