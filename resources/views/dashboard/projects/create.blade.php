@extends('layouts.dashboard')

@section('title', 'Tambah Project')

@section('content')
    @include('dashboard.projects._form', [
        'project' => null,
        'action' => route('dashboard.projects.store'),
        'method' => 'POST',
    ])
@endsection
