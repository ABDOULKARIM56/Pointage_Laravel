@extends('layouts.app')

@section('content')
<div class="tab-pane fade show active" id="condition">

    <h3 class="fw-bold mb-4">🔧 Configurations de l'entreprise</h3>

    <div class="row g-4">

        <!-- Horaires de travail -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    ⏰ Horaires de travail
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Heure de début</span>
                            <span class="fw-bold">{{ $settings->start_time ?? '--:--' }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Pause</span>
                            <span class="fw-bold">{{ $settings->break_time ?? '--:--' }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Reprise</span>
                            <span class="fw-bold">{{ $settings->resume_time ?? '--:--' }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Heure de fin</span>
                            <span class="fw-bold">{{ $settings->end_time ?? '--:--' }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Jours ouvrables -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    📅 Jours ouvrables
                </div>
                <div class="card-body">

                    @php
                        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
                        $work = $settings->workdays ?? []; // array
                    @endphp

                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group list-group-flush">
                                @foreach(array_slice($days, 0, 3) as $day)
                                    <li class="list-group-item">
                                        {{ $day }} {{ in_array($day, $work) ? '✔' : '✖' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-6">
                            <ul class="list-group list-group-flush">
                                @foreach(array_slice($days, 3, 3) as $day)
                                    <li class="list-group-item">
                                        {{ $day }} {{ in_array($day, $work) ? '✔' : '✖' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Retards & Tolérances -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    ⏳ Retards & Tolérances
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tolérance de retard</span>
                            <span class="fw-bold">{{ $settings->tolerance_minutes }} minutes</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Sanction après</span>
                            <span class="fw-bold">{{ $settings->sanction_after }} retards</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Type de sanction</span>
                            <span class="fw-bold">{{ $settings->sanctions ?? 'Non défini' }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Conditions & Réglements -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    📘 Conditions & règlements
                </div>
                <div class="card-body">

                    <p class="mb-2"><strong>Conditions :</strong></p>
                    <p class="text-muted small">
                        {{ $settings->conditions ?? 'Aucune condition définie.' }}
                    </p>

                    <p class="mb-2"><strong>Obligations :</strong></p>
                    <p class="text-muted small">
                        {{ $settings->obligations ?? 'Aucune obligation définie.' }}
                    </p>

                    <p class="mb-2"><strong>Sanctions :</strong></p>
                    <p class="text-muted small">
                        {{ $settings->sanctions ?? 'Aucune sanction définie.' }}
                    </p>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
