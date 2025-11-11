<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departement</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
   

    
    <div class="card">
        <h2>Departement</h2>
        <form action="{{ route('ajouter_departement') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text"  required />

            <label for="description">Description</label>
            <input id="description" name="description" type="text"  required />
            
            <button type="submit">Ajouter</button>
        </form>

 
    </div>

</div>
</body>
</html>
