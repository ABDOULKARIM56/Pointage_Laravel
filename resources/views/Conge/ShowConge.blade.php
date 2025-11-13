<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Congés</title>
</head>
<body>

    <h2>Liste des conge</h2>
     


        <form method="GET" action="{{ route('show_conge') }}" class="mb-4 d-flex gap-2" id="searchForm">
        <input 
            type="text" 
            name="type" 
            placeholder="Rechercher"
            value="{{ request('type') }}" 
            class="form-control " 
            id="searchInput"
        />
            <!-- c<button type="submit" class="btn btn-primary">Rechercher</button> -->
        </form>
        <form action="{{ route('create_cong') }}" method="GET" class="bg-white p-4 rounded shadow">
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
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conges as $cong)
            <tr>
                <td>{{ $cong->id }}</td>
                <td>{{ $cong->type }}</td>
                <td>
                    <!-- Formulaire de modification -->
                    <form action="{{ route('edit_cong',['id' => $cong->id]) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Modifier</button>
                    </form>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('suppression_cong', ['id' => $cong->id]) }}" method="POST" style="display:inline;">
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
