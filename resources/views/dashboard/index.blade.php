@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <p class="mt-1 text-sm text-neutral-400">Kelola konten dan project portfolio.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            <div class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
                <p class="text-xs uppercase tracking-wide text-neutral-500">Total project</p>
                <p class="mt-2 text-3xl font-semibold">{{ $projectCount }}</p>
            </div>
            <div class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
                <p class="text-xs uppercase tracking-wide text-neutral-500">Published</p>
                <p class="mt-2 text-3xl font-semibold text-lime-400">{{ $publishedCount }}</p>
            </div>
            <div class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
                <p class="text-xs uppercase tracking-wide text-neutral-500">Draft</p>
                <p class="mt-2 text-3xl font-semibold text-neutral-300">{{ $projectCount - $publishedCount }}</p>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-800 bg-neutral-900/60">
            <div class="flex items-center justify-between border-b border-neutral-800 px-5 py-4">
                <h2 class="text-sm font-semibold">Project terbaru</h2>
                <a href="{{ route('dashboard.projects.index') }}" class="text-xs text-lime-400 transition hover:text-lime-300">
                    Lihat semua →
                </a>
            </div>

            <div class="divide-y divide-neutral-800">
                @forelse ($recentProjects as $project)
                    <div class="flex items-center justify-between gap-4 px-5 py-3">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium">{{ $project->title }}</p>
                            <p class="truncate text-xs text-neutral-500">{{ $project->subtitle }}</p>
                        </div>
                        <span class="shrink-0 rounded-full px-2.5 py-1 text-[10px] font-semibold tracking-wide {{ $project->is_published ? 'bg-lime-400/10 text-lime-300' : 'bg-neutral-800 text-neutral-400' }}">
                            {{ $project->is_published ? 'PUBLISHED' : 'DRAFT' }}
                        </span>
                    </div>
                @empty
                    <p class="px-5 py-6 text-sm text-neutral-500">Belum ada project.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
