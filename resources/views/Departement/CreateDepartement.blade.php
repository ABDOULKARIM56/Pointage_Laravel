<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Département</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            max-width: 500px;
            margin: 50px auto;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-group-form {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .btn-group-form .btn {
            flex: 1;
        }
        .btn-submit {
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .btn-back {
            background-color: #6c757d;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4 bg-white">
        <h2>Ajouter un Département</h2>

        <form action="{{ route('ajouter_departement') }}" method="POST">
            @csrf

            <label for="nom" class="form-label">Nom</label>
            <input id="nom" name="nom" type="text" class="form-control" placeholder="Nom du département" required>

            <label for="description" class="form-label">Description</label>
            <input id="description" name="description" type="text" class="form-control" placeholder="Description du département" required>
            
            <!-- Boutons sur la même ligne -->
            <div class="btn-group-form">
                <button type="submit" class="btn btn-primary btn-submit">
                    <i class="fa fa-plus-circle"></i> Sauvegarder
                </button>

                <a href="{{ route('show_departement') }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
