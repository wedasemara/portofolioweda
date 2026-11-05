@php
    $project = $project ?? null;
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    @if (($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold">{{ $project ? 'Edit Project' : 'Tambah Project' }}</h1>
            <p class="mt-1 text-sm text-neutral-400">Kelola video, thumbnail, dan urutan tampil di portfolio.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.projects.index') }}" class="text-sm text-neutral-400 transition hover:text-white">
                Batal
            </a>
            <button type="submit" class="rounded-lg bg-lime-400 px-4 py-2 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
                Simpan
            </button>
        </div>
    </div>

    <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
        <h2 class="mb-4 text-sm font-semibold text-neutral-200">Informasi project</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <x-dashboard.field label="Judul" name="title" :value="$project?->title ?? ''" />
            <x-dashboard.field label="Subtitle" name="subtitle" :value="$project?->subtitle ?? ''" />
            <x-dashboard.field label="Tipe (contoh: REELS)" name="type_label" :value="$project?->type_label ?? ''" />
            <x-dashboard.field label="Urutan" name="sort_order" type="number" :value="$project?->sort_order ?? 0" />
        </div>

        <input type="hidden" name="is_published" value="0">

        <label class="mt-4 flex items-center gap-2 text-sm text-neutral-300">
            <input type="checkbox" name="is_published" value="1"
                   @checked((bool) old('is_published', $project?->is_published ?? true))
                   class="rounded border-neutral-700 bg-neutral-950 text-lime-400 focus:ring-lime-400">
            Publikasikan di halaman portfolio
        </label>
    </section>

    <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
        <h2 class="mb-4 text-sm font-semibold text-neutral-200">Video</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <x-dashboard.field label="URL / path video (opsional)" name="video_url" :value="$project?->video_path ?? ''" />

            <label class="block">
                <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Upload video</span>
                <input type="file" name="video_file" accept="video/mp4,video/webm,video/quicktime"
                       class="block w-full text-xs text-neutral-400 file:mr-3 file:rounded-md file:border-0 file:bg-neutral-800 file:px-3 file:py-2 file:text-xs file:text-neutral-200">
                <span class="mt-1 block text-xs text-neutral-500">MP4/WebM/MOV. Maksimal 500MB. Upload akan menggantikan path di atas.</span>
            </label>
        </div>

        @if ($project?->videoUrl())
            <a href="{{ $project->videoUrl() }}" target="_blank" rel="noopener"
               class="mt-3 inline-block text-xs text-lime-400 transition hover:text-lime-300">
                Lihat video saat ini ↗
            </a>
        @endif
    </section>

    <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
        <h2 class="mb-4 text-sm font-semibold text-neutral-200">Thumbnail</h2>
        <div class="grid gap-4 md:grid-cols-2">
            <x-dashboard.field label="URL / path thumbnail (opsional)" name="thumbnail_url" :value="$project?->thumbnail_path ?? ''" />

            <label class="block">
                <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Upload thumbnail</span>
                <input type="file" name="thumbnail_file" accept="image/jpeg,image/png,image/webp"
                       class="block w-full text-xs text-neutral-400 file:mr-3 file:rounded-md file:border-0 file:bg-neutral-800 file:px-3 file:py-2 file:text-xs file:text-neutral-200">
                <span class="mt-1 block text-xs text-neutral-500">JPG/PNG/WebP. Maksimal 5MB.</span>
            </label>
        </div>

        @if ($project?->thumbnailUrl())
            <img src="{{ $project->thumbnailUrl() }}" alt="Thumbnail {{ $project->title }}"
                 class="mt-3 h-28 w-20 rounded-lg object-cover">
        @endif
    </section>

    <div class="flex justify-end">
        <button type="submit" class="rounded-lg bg-lime-400 px-5 py-2.5 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
            Simpan project
        </button>
    </div>
</form>
