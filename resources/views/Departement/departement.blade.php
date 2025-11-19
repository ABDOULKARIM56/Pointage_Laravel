@extends('layouts.app')

@section('title', 'Departements')

@section('content')
<div class="tab-content">
    <div class="tab-pane fade show active">

        {{-- Mode LISTE --}}
        @if ($mode === 'list')
            @include('Departement.ShowDepartement', ['departements' => $departements])
        @endif

        {{-- Mode FORMULAIRE --}}
        @if ($mode === 'create')
            @include('Departement.CreateDepartement')
        @endif
        @if ($mode === 'edit')
            @include('Departement.EditDepartement',['departements' => $departements])
        @endif

    </div>
</div>
@endsection
