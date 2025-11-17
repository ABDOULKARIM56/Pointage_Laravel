
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


    <div class="container bg-light p-4">
        <h2 class="mb-4 text-center" style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Liste des Congés</h2>

        {{-- Barre de recherche et bouton d’ajout --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- c d-flex w-50 -->
            <form method="GET" action="{{ route('show_conge') }}" id="searchForm" class="flex-grow-1 d-flex">
                <input 
                    type="text" 
                    name="type" 
                    id="searchInput"
                    placeholder="🔍 Rechercher un congé..."
                    value="{{ request('type') }}" 
                    class="form-control me-2"
                >
            </form>

            <form action="{{ route('conge') }}" method="GET">
                <input type="hidden" name="mode" value="create">

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
                <thead >
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
                                <form action="{{ route('conge') }}" method="GET">
                                <input type="hidden" name="mode" value="edit">
                                <input type="hidden" name="id" value="{{ $cong->id }}">
                                <button type="submit" class="btn btn-warning btn-sm btn-action text-white">
                                    <i class="bi bi-pencil-square"></i> 
                                </button>
                                </form>

                                {{-- Bouton Supprimer --}}
                                <form action="{{ route('suppression_cong', ['id' => $cong->id]) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce congé ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                        <!-- bfa fa-trash -->
                                        <i title="Supprimer" class="bi bi-trash3"></i>
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


