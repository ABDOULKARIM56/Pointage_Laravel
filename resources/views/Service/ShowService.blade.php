<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Services</title>
</head>
<body>

    <h2>Liste des Services</h2>

    <!-- 🔍 Barre de recherche -->
    <form method="GET" action="{{ route('show_service') }}" class="mb-4 d-flex gap-2" id="searchForm">
        <input 
            type="text" 
            name="nom" 
            placeholder="Rechercher un service ou un département"
            value="{{ request('nom') }}" 
            class="form-control" 
            id="searchInput"
        />
    </form>

    <!-- ➕ Bouton d’ajout -->
    <form action="{{ route('create_servi') }}" method="GET" class="bg-white p-4 rounded shadow">
        @csrf
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(window.searchTimeout);
            window.searchTimeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 500);
        });
    </script>

    <!-- 🧾 Tableau des services -->
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Service</th>
                <th>Département</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $servi)
                <tr>
                    <td>{{ $servi->id }}</td>
                    <td>{{ $servi->nom }}</td>

                    <!-- ✅ On accède à la relation 'departement' -->
                    <td>{{ $servi->departement?->nom ?? '—' }}</td>

                    <td>
                        <!-- ✏️ Modifier -->
                        <form action="{{ route('edit_servi', ['service' => $servi]) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit">Modifier</button>
                        </form>

                        <!-- 🗑️ Supprimer -->
                        <form action="{{ route('suppression_servi', ['service' => $servi]) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="color:red;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
