<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
</head>
<body>

    <h2>Liste des Service</h2>

          <form method="GET" action="{{ route('show_service') }}" class="mb-4 d-flex gap-2" id="searchForm">
            <input 
                type="text" 
                name="nom" 
                placeholder="Rechercher"
                value="{{ request('nom') }}" 
                class="form-control " 
                id="searchInput"
            />
            <!-- c<button type="submit" class="btn btn-primary">Rechercher</button> -->
        </form>
        <form action="{{ route('create_servi') }}" method="GET" class="bg-white p-4 rounded shadow">
            @csrf
            
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            // Petite temporisation pour éviter de spammer le serveur à chaque frappe
            clearTimeout(window.searchTimeout);
            window.searchTimeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 500); // attend 0,5 seconde après la dernière frappe
        });
        </script>
    <table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Departement</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $servi)
            <tr>
                <td>{{ $servi->id }}</td>
                <td>{{ $servi->nom }}</td>
                <td>{{ $servi->departement_id->nom }}</td>
                <td>
                    <!-- Formulaire de modification -->
                    <form action="{{ route('edit_servi',['service' => $servi]) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Modifier</button>
                    </form>

                    <!-- Formulaire de suppression -->
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
