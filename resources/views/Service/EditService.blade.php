<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
   

    
    <div class="card">
        <h2>Departement</h2>
        <form action="{{ route('modification_servi',['service' => $service]) }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text" value="{{ $service->nom }}"  required />

           <label for="departement_id">Département</label>
            <select id="departement_id" name="departement_id" required>
                @foreach ($departements as $depart)
                    <option value="{{ $depart->id }}" {{ $service->departement_id == $depart->id ? 'selected' : '' }}>
                        {{ $depart->nom }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Sauvegarder</button>
        </form>

 
    </div>

</div>
</body>
</html>
