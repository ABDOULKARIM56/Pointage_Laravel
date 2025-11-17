@extends('layouts.app')

@section('title', 'Permissions')

@section('content')
<div class="tab-content">
    <div class="tab-pane fade show active">

        {{-- Mode LISTE --}}
        @if ($mode === 'list')
            @include('Permission.ShowPermission', ['permissions' => $permissions])
        @endif

        {{-- Mode FORMULAIRE --}}
        @if ($mode === 'create')
            @include('Permission.CreatePermission')
        @endif
        @if ($mode === 'edit')
            @include('Permission.EditPermission',['permissions' => $permissions])
        @endif

    </div>
</div>
@endsection
