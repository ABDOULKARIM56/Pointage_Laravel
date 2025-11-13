<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <h2>Liste des Départements</h2>
     
        <form method="GET" action="{{ route('show_departement') }}" class="mb-4 d-flex gap-2" id="searchForm">
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
        <form action="{{ route('create_depart') }}" method="GET" class="bg-white p-4 rounded shadow">
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
                <td>
                       <!-- Formulaire de detail -->
                    <form action="{{ route('detail', ['detail' => $depart, 'model' => 'show_depart']) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Détail</button>
                    </form>

                    <!-- Formulaire de modification -->
                    <form action="{{ route('edit_depart',['id' => $depart->id]) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Modifier</button>
                    </form>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('suppression_depart', ['id' => $depart->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" style="color:red;">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    {{ $departements->links() }}
</div>



</body>
</html>
