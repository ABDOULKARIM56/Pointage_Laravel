<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* En-têtes du tableau */
        th {
            background-color: #2196F3 !important;
            color: white !important;
            text-align: center;
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
        <h2 class="mb-4 text-center" style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Liste des Départements</h2>

        <!-- Barre recherche + bouton Ajouter -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Recherche -->
            <form method="GET" action="{{ route('show_departement') }}" class="flex-grow-1 d-flex" id="searchForm">
                <input 
                    type="text" 
                    name="nom" 
                    placeholder="🔍 Rechercher un département..." 
                    value="{{ request('nom') }}" 
                    class="form-control" 
                    id="searchInput"
                />
            </form>

            <!-- Ajouter -->
            <form action="{{ route('create_depart') }}" method="GET">
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
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departements as $depart)
                        <tr>
                            <td>{{ $depart->id }}</td>
                            <td>{{ $depart->nom }}</td>
                            <td>{{ $depart->description }}</td>
                            <td class="d-flex gap-2 justify-content-center">

                                <!-- Détail -->
                                <form action="{{ route('detail', ['detail' => $depart, 'model' => 'show_depart']) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm btn-action text-white">
                                        <i title="Détail" class="bi bi-eye"></i> 
                                    </button>
                                </form>

                                <!-- Modifier -->
                                <form action="{{ route('edit_depart',['id' => $depart->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm btn-action text-white">
                                        <i title="Modifier" class="bi bi-pencil-square"></i> 
                                    </button>
                                </form>

                                <!-- Supprimer -->
                                <form action="{{ route('suppression_depart', ['id' => $depart->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm btn-action">
                                        <i title="Supprimer" class="bi bi-trash3"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination d-flex justify-content-center  -->
        <div class="mt-3">
            {{ $departements->links() }}
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
