<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Permission</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #f0f2f5;
        }
        .card {
            max-width: 400px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .input-group .input-group-text,
        .input-group .form-control {
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
<!-- </head>
<body> -->

<div class="container">
    <div class="card p-4 bg-white">
        <h2 style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Modifier une Permission</h2>

        <form action="{{ route('modification_permi',['id' => $permissions->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="type" class="form-label">Type de Permission</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                    <input type="text" id="type" name="type" class="form-control" value="{{ $permissions->type }}" required>
                </div>
            </div>

            <!-- Boutons sur la même ligne -->
            <div class="btn-group-form mt-3">
                <button type="submit" class="btn btn-primary btn-submit">
                    <i class="fa fa-save"></i> Sauvegarder
                </button>

                <a href="{{ route('show_permission') }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>

<!-- </body>
</html> -->
