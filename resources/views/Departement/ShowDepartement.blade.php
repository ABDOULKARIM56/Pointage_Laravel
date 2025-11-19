
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
@extends('layouts.app')

@section('content')
    <div class="container bg-light p-4">

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
            <form action="{{ route('departement') }}" method="GET">
                <input type="hidden" name="mode" value="create">

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
                                <form action="{{ route('departement') }}" method="GET">
                                <input type="hidden" name="mode" value="edit">
                                <input type="hidden" name="id" value="{{ $depart->id }}">
                                <button type="submit" class="btn btn-warning btn-sm btn-action text-white">
                                    <i class="bi bi-pencil-square"></i> 
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

@endsection