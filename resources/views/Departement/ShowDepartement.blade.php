<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
</head>
<body>

    <h2>Liste des Départements</h2>
     <form action="{{ route('create_depart') }}" method="GET" class="bg-white p-4 rounded shadow">
            @csrf
            
            <button type="submit">Ajouter</button>
        </form>
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


</body>
</html>
