@extends('layouts.dashboard')

@section('title', 'Projects')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold">Projects</h1>
                <p class="mt-1 text-sm text-neutral-400">Daftar video dan slot portfolio.</p>
            </div>
            <a href="{{ route('dashboard.projects.create') }}"
               class="rounded-lg bg-lime-400 px-4 py-2 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
                + Tambah project
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-neutral-800 bg-neutral-900/60">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-800 text-left text-sm">
                    <thead class="bg-neutral-900 text-xs uppercase tracking-wide text-neutral-500">
                        <tr>
                            <th class="px-5 py-3 font-medium">Project</th>
                            <th class="px-5 py-3 font-medium">Tipe</th>
                            <th class="px-5 py-3 font-medium">Urutan</th>
                            <th class="px-5 py-3 font-medium">Status</th>
                            <th class="px-5 py-3 text-right font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-800">
                        @forelse ($projects as $project)
                            <tr>
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        @if ($project->thumbnailUrl())
                                            <img src="{{ $project->thumbnailUrl() }}" alt=""
                                                 class="h-14 w-10 shrink-0 rounded-md object-cover">
                                        @else
                                            <div class="flex h-14 w-10 shrink-0 items-center justify-center rounded-md bg-neutral-800 text-xs text-neutral-600">
                                                ▶
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <p class="truncate font-medium text-neutral-100">{{ $project->title }}</p>
                                            <p class="truncate text-xs text-neutral-500">{{ $project->subtitle }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-neutral-400">{{ $project->type_label ?: '—' }}</td>
                                <td class="px-5 py-3 text-neutral-400">{{ $project->sort_order }}</td>
                                <td class="px-5 py-3">
                                    <span class="rounded-full px-2.5 py-1 text-[10px] font-semibold tracking-wide {{ $project->is_published ? 'bg-lime-400/10 text-lime-300' : 'bg-neutral-800 text-neutral-400' }}">
                                        {{ $project->is_published ? 'PUBLISHED' : 'DRAFT' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('dashboard.projects.edit', $project) }}"
                                           class="text-xs text-lime-400 transition hover:text-lime-300">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.projects.destroy', $project) }}"
                                              onsubmit="return confirm('Hapus project ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs text-red-400 transition hover:text-red-300">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-sm text-neutral-500">
                                    Belum ada project. Tambahkan project pertama.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $projects->links() }}
    </div>
@endsection
