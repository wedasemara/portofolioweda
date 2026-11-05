@extends('layouts.dashboard')

@section('title', 'Konten')

@section('content')
    <form method="POST" action="{{ route('dashboard.content.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold">Konten</h1>
                <p class="mt-1 text-sm text-neutral-400">Edit teks dan media yang tampil di halaman portfolio.</p>
            </div>
            <button type="submit" class="rounded-lg bg-lime-400 px-4 py-2 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
                Simpan perubahan
            </button>
        </div>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">SEO & Brand</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Meta title" name="settings[meta_title]" :value="$settings['meta_title']" />
                <x-dashboard.field label="Nama brand" name="settings[brand_name]" :value="$settings['brand_name']" />
                <x-dashboard.field label="Brand mark" name="settings[brand_mark]" :value="$settings['brand_mark']" />
                <x-dashboard.field label="Footer tagline" name="settings[footer_tagline]" :value="$settings['footer_tagline']" />
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Meta description" name="settings[meta_description]" :value="$settings['meta_description']" :rows="2" />
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">Hero</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Eyebrow" name="settings[hero_eyebrow]" :value="$settings['hero_eyebrow']" />
                <x-dashboard.field label="Durasi / label media" name="settings[hero_duration]" :value="$settings['hero_duration']" />
                <x-dashboard.field label="Judul baris 1" name="settings[hero_title_line1]" :value="$settings['hero_title_line1']" />
                <x-dashboard.field label="Judul baris 2" name="settings[hero_title_line2]" :value="$settings['hero_title_line2']" />
                <x-dashboard.field label="Judul highlight" name="settings[hero_title_highlight]" :value="$settings['hero_title_highlight']" />
                <x-dashboard.field label="Label tombol" name="settings[hero_button_label]" :value="$settings['hero_button_label']" />
                <x-dashboard.field label="Meta kiri" name="settings[hero_meta_left]" :value="$settings['hero_meta_left']" />
                <x-dashboard.field label="Meta kanan" name="settings[hero_meta_right]" :value="$settings['hero_meta_right']" />
                <x-dashboard.field label="Index" name="settings[hero_index]" :value="$settings['hero_index']" />
                <x-dashboard.field label="Total index" name="settings[hero_total]" :value="$settings['hero_total']" />
                <x-dashboard.field label="Badge atas" name="settings[hero_badge_top]" :value="$settings['hero_badge_top']" />
                <x-dashboard.field label="Badge bawah" name="settings[hero_badge_bottom]" :value="$settings['hero_badge_bottom']" />
                <x-dashboard.field label="Link media hero" name="settings[hero_link]" :value="$settings['hero_link']" />
                <x-dashboard.field label="Thumbnail hero (URL/path)" name="settings[hero_thumbnail]" :value="$settings['hero_thumbnail']" />
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Deskripsi hero" name="settings[hero_description]" :value="$settings['hero_description']" :rows="3" />
                </div>
                <label class="block">
                    <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Upload thumbnail hero</span>
                    <input type="file" name="hero_thumbnail_file" accept="image/jpeg,image/png,image/webp"
                           class="block w-full text-xs text-neutral-400 file:mr-3 file:rounded-md file:border-0 file:bg-neutral-800 file:px-3 file:py-2 file:text-xs file:text-neutral-200">
                    <span class="mt-1 block text-xs text-neutral-500">Maksimal 5MB. Upload akan menggantikan path di atas.</span>
                    @if ($settings['hero_thumbnail'])
                        <img src="{{ \App\Support\Media::url($settings['hero_thumbnail']) }}" alt="Thumbnail hero" class="mt-3 h-24 w-32 rounded-lg object-cover">
                    @endif
                </label>
            </div>
        </section>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">About</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Judul" name="settings[about_title]" :value="$settings['about_title']" />
                <x-dashboard.field label="Highlight" name="settings[about_highlight]" :value="$settings['about_highlight']" />
                <x-dashboard.field label="Foto profil (URL/path)" name="settings[about_photo]" :value="$settings['about_photo']" />
                <label class="block">
                    <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Upload foto profil</span>
                    <input type="file" name="about_photo_file" accept="image/jpeg,image/png,image/webp"
                           class="block w-full text-xs text-neutral-400 file:mr-3 file:rounded-md file:border-0 file:bg-neutral-800 file:px-3 file:py-2 file:text-xs file:text-neutral-200">
                    @if ($settings['about_photo'])
                        <img src="{{ \App\Support\Media::url($settings['about_photo']) }}" alt="Foto profil" class="mt-3 h-24 w-24 rounded-lg object-cover">
                    @endif
                </label>
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Lead" name="settings[about_lead]" :value="$settings['about_lead']" :rows="2" />
                </div>
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Body" name="settings[about_body]" :value="$settings['about_body']" :rows="4" />
                </div>
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Skills (satu per baris)" name="settings[about_skills]" :value="$settings['about_skills']" :rows="5" />
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">Section Work</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Judul baris 1" name="settings[work_title_line1]" :value="$settings['work_title_line1']" />
                <x-dashboard.field label="Judul highlight" name="settings[work_title_highlight]" :value="$settings['work_title_highlight']" />
                <x-dashboard.field label="Status placeholder" name="settings[placeholder_status]" :value="$settings['placeholder_status']" />
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Deskripsi" name="settings[work_description]" :value="$settings['work_description']" :rows="2" />
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">Services</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Judul baris 1" name="settings[services_title_line1]" :value="$settings['services_title_line1']" />
                <x-dashboard.field label="Judul highlight" name="settings[services_title_highlight]" :value="$settings['services_title_highlight']" />
            </div>

            <div class="mt-5 space-y-4">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="rounded-lg border border-neutral-800 p-4">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-neutral-500">Service {{ $i }}</p>
                        <div class="grid gap-3 md:grid-cols-2">
                            <x-dashboard.field :label="'Judul'" :name="'settings[service_'.$i.'_title]'" :value="$settings['service_'.$i.'_title']" />
                            <x-dashboard.field :label="'Deskripsi'" :name="'settings[service_'.$i.'_description]'" :value="$settings['service_'.$i.'_description']" />
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        <section class="rounded-xl border border-neutral-800 bg-neutral-900/60 p-5">
            <h2 class="mb-4 text-sm font-semibold text-neutral-200">Contact</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-dashboard.field label="Eyebrow" name="settings[contact_eyebrow]" :value="$settings['contact_eyebrow']" />
                <x-dashboard.field label="Judul baris 1" name="settings[contact_title_line1]" :value="$settings['contact_title_line1']" />
                <x-dashboard.field label="Judul highlight" name="settings[contact_title_highlight]" :value="$settings['contact_title_highlight']" />
                <x-dashboard.field label="Nomor WhatsApp" name="settings[whatsapp_number]" :value="$settings['whatsapp_number']" />
                <x-dashboard.field label="Instagram URL" name="settings[instagram_url]" :value="$settings['instagram_url']" />
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Deskripsi" name="settings[contact_description]" :value="$settings['contact_description']" :rows="2" />
                </div>
                <div class="md:col-span-2">
                    <x-dashboard.textarea label="Pesan WhatsApp otomatis" name="settings[whatsapp_message]" :value="$settings['whatsapp_message']" :rows="2" />
                </div>
            </div>
        </section>

        <div class="flex justify-end">
            <button type="submit" class="rounded-lg bg-lime-400 px-5 py-2.5 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
                Simpan perubahan
            </button>
        </div>
    </form>
@endsection
