<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{ $employe }}
    <form action="{{ route('deconnexion') }}" method="POST" class="bg-white p-4 rounded shadow">
                @csrf
                <button type="submit">Deconnecter</button>
    </form>
</body>
</html>