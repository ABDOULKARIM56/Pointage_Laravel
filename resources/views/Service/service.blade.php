@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="tab-content">
    <div class="tab-pane fade show active">

        {{-- Mode LISTE --}}
        @if ($mode === 'list')
            @include('Service.ShowService', ['services' => $services])
        @endif

        {{-- Mode FORMULAIRE --}}
        @if ($mode === 'create')
            @include('Service.CreateService')
        @endif
        @if ($mode === 'edit')
            @include('Service.EditService',['services' => $services])
        @endif

    </div>
</div>
@endsection
