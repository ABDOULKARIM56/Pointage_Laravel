@extends('layouts.app')

@section('title', 'conges')

@section('content')
<div class="tab-content">
    <div class="tab-pane fade show active">

        {{-- Mode LISTE --}}
        @if ($mode === 'list')
            @include('Conge.ShowConge', ['conges' => $conges])
        @endif

        {{-- Mode FORMULAIRE --}}
        @if ($mode === 'create')
            @include('Conge.CreateConge')
        @endif
        @if ($mode === 'edit')
            @include('Conge.EditConge',['conges' => $conges])
        @endif

    </div>
</div>
@endsection
