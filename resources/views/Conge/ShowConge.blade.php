<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Congés</title>

    {{-- Bootstrap & FontAwesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4 text-center">Liste des Congés</h2>

        {{-- Barre de recherche et bouton d’ajout --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="GET" action="{{ route('show_conge') }}" id="searchForm" class="d-flex w-50">
                <input 
                    type="text" 
                    name="type" 
                    id="searchInput"
                    placeholder="Rechercher un congé..."
                    value="{{ request('type') }}" 
                    class="form-control me-2"
                >
            </form>

            <form action="{{ route('create_cong') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Ajouter
                </button>
            </form>
        </div>

        {{-- Script de recherche instantanée --}}
        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                clearTimeout(window.searchTimeout);
                window.searchTimeout = setTimeout(() => {
                    document.getElementById('searchForm').submit();
                }, 500); // délai de 0,5 seconde après la dernière frappe
            });
        </script>

        {{-- Tableau des congés --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conges as $cong)
                        <tr>
                            <td>{{ $cong->id }}</td>
                            <td>{{ $cong->type }}</td>
                            <td class="text-center">

                            

                                {{-- Bouton Modifier --}}
                                <a href="{{ route('edit_cong', ['id' => $cong->id]) }}" 
                                   class="btn btn-sm btn-warning text-white mx-1" 
                                   title="Modifier">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {{-- Bouton Supprimer --}}
                                <form action="{{ route('suppression_cong', ['id' => $cong->id]) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce congé ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Aucun congé trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $conges->links() }}
        </div>
    </div>

</body>
</html>
