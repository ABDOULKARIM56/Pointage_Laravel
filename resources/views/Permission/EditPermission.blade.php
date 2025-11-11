<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
   

    
    <div class="card">
        <h2>Permission</h2>
        <form action="{{ route('modification_permi',['id' => $permission->id]) }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <label for="type">Type</label>
            <input id="type" name="type" type="text" value="{{ $permission->type }}"  required />

           
            <button type="submit">Sauvegarder</button>
        </form>

 
    </div>

</div>
</body>
</html>
