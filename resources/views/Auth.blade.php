<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
   

    
    <div class="card">
        <h2>Connexion Employé</h2>
        <form action="{{ route('connexion') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <label for="email">E‑mail</label>
            <input id="email" name="email" type="email" autocomplete="username" required />

            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required />
            
            <button type="submit">Se connecter</button>
        </form>

 
    </div>

</div>
</body>
</html>
