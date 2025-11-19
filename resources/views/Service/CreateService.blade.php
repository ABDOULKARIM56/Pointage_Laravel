
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
        .input-group-text {
            background-color: #e9ecef;
        }
        .btn-submit {
            width: 100%;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
    </style>


<div class="container">
    <div class="card p-4 bg-white">
        <h2 style="color:#2196F3; justify-content: center;font-size: 30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Ajouter un Service</h2>

        <form action="{{ route('ajouter_service') }}" method="POST">
            @csrf

            <!-- Nom du service -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du Service</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom du service" required>
                </div>
            </div>

            <!-- Département -->
            <div class="mb-3">
                <label for="departement_id" class="form-label">Département</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-layer-group"></i></span>
                    <select id="departement_id" name="departement_id" class="form-select" required>
                        <option value="">-- Sélectionner un département --</option>
                        @foreach ($departements as $depart)
                            <option value="{{ $depart->id }}">{{ $depart->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn-group-form mt-3">
            <button type="submit" class="btn btn-primary btn-submit mt-3">
                <i class="fa fa-plus-circle"></i> Ajouter
            </button>
             <a href="{{ route('service', ['mode' => 'list']) }}" class="btn btn-secondary btn-back">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
                </div>
        </form>
    </div>
</div>

