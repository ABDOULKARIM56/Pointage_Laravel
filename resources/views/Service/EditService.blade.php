<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Service</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }
        .card {
            max-width: 450px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .input-group .input-group-text,
        .input-group .form-control,
        select.form-control {
            height: 48px;
            font-size: 1rem;
        }
        .btn-group-form {
            display: flex;
            gap: 10px;
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
        <h2>Modifier un Service</h2>

        <form action="{{ route('modification_servi',['service' => $service]) }}" method="POST">
            @csrf

            <!-- Nom du service -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du Service</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $service->nom }}" required>
                </div>
            </div>

            <!-- Département -->
            <div class="mb-3">
                <label for="departement_id" class="form-label">Département</label>
                <select id="departement_id" name="departement_id" class="form-control" required>
                    @foreach ($departements as $depart)
                        <option value="{{ $depart->id }}" {{ $service->departement_id == $depart->id ? 'selected' : '' }}>
                            {{ $depart->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Boutons sur la même ligne -->
            <div class="btn-group-form mt-3">
                <button type="submit" class="btn btn-primary btn-submit">
                    <i class="fa fa-save"></i> Sauvegarder
                </button>

                <a href="{{ route('show_service') }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
