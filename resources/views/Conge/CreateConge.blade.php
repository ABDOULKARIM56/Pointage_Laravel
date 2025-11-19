
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
        .input-group-text {
            background-color: #e9ecef;
        }
        .btn-submit, .btn-back {
            width: 100%;
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
        /* Conteneur pour les boutons côte à côte */
        .btn-group-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-group-form .btn {
            flex: 1;
        }
    </style>


<div class="container">
    <div class="card p-4 bg-white">
        <h2 style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Ajouter un Congé</h2>

        <form action="{{ route('ajouter_conge') }}" method="POST">
            @csrf

            <!-- Type de congé -->
            <div class="mb-3">
                <label for="type" class="form-label">Type de Congé</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-calendar-days"></i></span>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Nom du congé" required>
                </div>
            </div>

            <!-- Boutons sur la même ligne -->
            <div class="btn-group-form">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> Sauvegarder
                </button>

                         <a href="{{ route('conge', ['mode' => 'list']) }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>



