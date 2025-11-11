<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Congés</title>
</head>
<body>

    <h2>Liste des conge</h2>
     <form action="{{ route('create_cong') }}" method="GET" class="bg-white p-4 rounded shadow">
            @csrf
            
            <button type="submit">Ajouter</button>
        </form>
        <form method="GET" action="{{ route('show_conge') }}" class="mb-4 flex gap-2">
            <input type="text" name="type" placeholder="Rechercher par type" value="{{ request('type') }}" class="border rounded p-2 flex-1" />
            <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded">Rechercher</button>
        </form>
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
