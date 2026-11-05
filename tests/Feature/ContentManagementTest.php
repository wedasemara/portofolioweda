<?php

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('guest tidak bisa mengakses halaman konten', function () {
    $this->get('/dashboard/content')->assertRedirect('/login');
});

test('user bisa memperbarui konten', function () {
    $this->actingAs($this->user)
        ->put('/dashboard/content', [
            'settings' => [
                'hero_eyebrow' => 'EDITOR BARU',
                'meta_title' => 'Judul Baru',
            ],
        ])
        ->assertRedirect(route('dashboard.content.edit'));

    expect(Setting::query()->find('hero_eyebrow')?->value)->toBe('EDITOR BARU');
    expect(Setting::query()->find('meta_title')?->value)->toBe('Judul Baru');
});

test('user bisa mengunggah thumbnail hero', function () {
    Storage::fake(config('cms.disk'));

    $this->actingAs($this->user)
        ->put('/dashboard/content', [
            'settings' => [],
            'hero_thumbnail_file' => UploadedFile::fake()->image('hero.jpg', 800, 600),
        ])
        ->assertRedirect(route('dashboard.content.edit'));

    $path = Setting::query()->find('hero_thumbnail')?->value;

    expect($path)->not->toBeNull();
    expect($path)->not->toStartWith('/images/');
    Storage::disk(config('cms.disk'))->assertExists($path);
});
