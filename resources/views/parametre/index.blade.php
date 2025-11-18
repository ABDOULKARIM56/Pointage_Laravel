@extends('layouts.app')

@section('content')
<div class="tab-pane fade show active" id="parametre">
  <div class="tab-content mt-3" id="settingsTabContent">
    <div class="tab-pane fade show active" id="services">

      <h4>🛠️ Configurations</h4>
      <p>Contenu fictif pour la Configurations</p>

      <h3 class="fw-bold mb-4">🔧 Configurations de l'entreprise</h3>

      <div class="row g-4">

        <!-- Horaires -->
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
              ⏰ Horaires de travail
            </div>
            <div class="card-body">

              <form action="{{ route('settings.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label class="form-label">Heure de début</label>
                  <input type="time" name="start_time" class="form-control"
                    value="{{ old('start_time', optional($settings)->start_time) }}" />
                </div>

                <div class="mb-3">
                  <label class="form-label">Heure de pause</label>
                  <input type="time" name="break_time" class="form-control"
                    value="{{ old('break_time', optional($settings)->break_time) }}" />
                </div>

                <div class="mb-3">
                  <label class="form-label">Heure de reprise</label>
                  <input type="time" name="resume_time" class="form-control"
                    value="{{ old('resume_time', optional($settings)->resume_time) }}" />
                </div>

                <div class="mb-3">
                  <label class="form-label">Heure de fin</label>
                  <input type="time" name="end_time" class="form-control"
                    value="{{ old('end_time', optional($settings)->end_time) }}" />
                </div>

                <button class="btn btn-primary w-100">
                  Enregistrer
                </button>

              </form>
            </div>
          </div>
        </div>

        <!-- Jours ouvrables -->
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
              📅 Jours ouvrables
            </div>
            <div class="card-body">

              @php
                $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
                $saved = optional($settings)->workdays ?? [];
              @endphp

              <form class="row" action="{{ route('settings.update') }}" method="POST">
                @csrf

                @foreach(array_chunk($days, 3) as $col)
                <div class="col-6">
                  @foreach($col as $day)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox"
                          name="workdays[]" value="{{ $day }}"
                          {{ in_array($day, $saved) ? 'checked' : '' }}>
                      <label class="form-check-label">{{ $day }}</label>
                    </div>
                  @endforeach
                </div>
                @endforeach

                <div class="mt-3">
                  <button class="btn btn-primary w-100">
                    Enregistrer
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- Retard et Tolerance -->
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
              ⏳ Retards & Tolérances
            </div>
            <div class="card-body">

              <form action="{{ route('settings.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label class="form-label">Tolérance (minutes)</label>
                  <input type="number" name="tolerance_minutes"
                    class="form-control"
                    value="{{ old('tolerance_minutes', optional($settings)->tolerance_minutes ?? 10) }}">
                </div>

                <div class="mb-3">
                  <label class="form-label">Sanction automatique après X retards</label>
                  <input type="number" name="sanction_after"
                    class="form-control"
                    value="{{ old('sanction_after', optional($settings)->sanction_after ?? 3) }}">
                </div>

                <button class="btn btn-primary w-100">
                  Enregistrer
                </button>
              </form>

            </div>
          </div>
        </div>

        <!-- Conditions & obligations -->
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
              📘 Conditions, obligations & sanctions
            </div>
            <div class="card-body">

              <form action="{{ route('settings.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label class="form-label">Conditions de travail</label>
                  <textarea class="form-control" name="conditions" rows="2">{{ old('conditions', optional($settings)->conditions) }}</textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label">Obligations</label>
                  <textarea class="form-control" name="obligations" rows="2">{{ old('obligations', optional($settings)->obligations) }}</textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label">Sanctions</label>
                  <textarea class="form-control" name="sanctions" rows="2">{{ old('sanctions', optional($settings)->sanctions) }}</textarea>
                </div>

                <button class="btn btn-primary w-100">
                  Enregistrer
                </button>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>









@endsection
