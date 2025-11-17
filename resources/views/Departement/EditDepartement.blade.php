
    <style>
        body {
            background-color: #f0f2f5;
        }
        .card {
            max-width: 500px;
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


<div class="container">
    <div class="card p-4 bg-white">
        <h2 style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Modifier un Département</h2>

        <form action="{{ route('modification_depart',['id' => $departement->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $departement->nom }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-align-left"></i></span>
                    <input type="text" id="description" name="description" class="form-control" value="{{ $departement->description }}" required>
                </div>
            </div>

            <!-- Boutons sur la même ligne -->
            <div class="btn-group-form mt-3">
                <button type="submit" class="btn btn-primary btn-submit">
                    <i class="fa fa-save"></i> Sauvegarder
                </button>

                          <a href="{{ route('departement', ['mode' => 'list']) }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>


