@extends('layouts.dashboard')

@section('title', 'Edit Project')

@section('content')
    @include('dashboard.projects._form', [
        'project' => $project,
        'action' => route('dashboard.projects.update', $project),
        'method' => 'PUT',
    ])
@endsection
