<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = User::factory()->create();

    Storage::fake(config('cms.disk'));
});

test('guest tidak bisa mengakses halaman project', function () {
    $this->get('/dashboard/projects')->assertRedirect('/login');
});

test('user bisa membuat project dengan upload video dan thumbnail', function () {
    $this->actingAs($this->user)
        ->post('/dashboard/projects', [
            'title' => 'Project Baru',
            'subtitle' => 'Subtitle project',
            'type_label' => 'REELS',
            'sort_order' => 7,
            'is_published' => '1',
            'video_file' => UploadedFile::fake()->create('video.mp4', 1024, 'video/mp4'),
            'thumbnail_file' => UploadedFile::fake()->image('thumb.jpg', 640, 360),
        ])
        ->assertRedirect(route('dashboard.projects.index'));

    $project = Project::query()->where('title', 'Project Baru')->firstOrFail();

    expect($project->is_published)->toBeTrue();
    expect($project->video_path)->not->toBeNull();
    expect($project->thumbnail_path)->not->toBeNull();

    Storage::disk(config('cms.disk'))->assertExists($project->video_path);
    Storage::disk(config('cms.disk'))->assertExists($project->thumbnail_path);
});

test('update project menghapus file lama', function () {
    $oldVideo = 'projects/videos/old.mp4';
    Storage::disk(config('cms.disk'))->put($oldVideo, 'old-video');

    $project = Project::query()->create([
        'title' => 'Project Lama',
        'subtitle' => null,
        'type_label' => 'REELS',
        'video_path' => $oldVideo,
        'thumbnail_path' => null,
        'sort_order' => 1,
        'is_published' => true,
    ]);

    $this->actingAs($this->user)
        ->put(route('dashboard.projects.update', $project), [
            'title' => 'Project Diperbarui',
            'video_file' => UploadedFile::fake()->create('new.mp4', 1024, 'video/mp4'),
        ])
        ->assertRedirect(route('dashboard.projects.index'));

    $project->refresh();

    expect($project->title)->toBe('Project Diperbarui');
    expect($project->video_path)->not->toBe($oldVideo);

    Storage::disk(config('cms.disk'))->assertMissing($oldVideo);
    Storage::disk(config('cms.disk'))->assertExists($project->video_path);
});

test('user bisa menghapus project beserta filenya', function () {
    $video = 'projects/videos/delete.mp4';
    $thumbnail = 'projects/thumbnails/delete.jpg';

    Storage::disk(config('cms.disk'))->put($video, 'video');
    Storage::disk(config('cms.disk'))->put($thumbnail, 'thumbnail');

    $project = Project::query()->create([
        'title' => 'Project Hapus',
        'subtitle' => null,
        'type_label' => 'REELS',
        'video_path' => $video,
        'thumbnail_path' => $thumbnail,
        'sort_order' => 1,
        'is_published' => true,
    ]);

    $this->actingAs($this->user)
        ->delete(route('dashboard.projects.destroy', $project))
        ->assertRedirect(route('dashboard.projects.index'));

    expect(Project::query()->find($project->id))->toBeNull();

    Storage::disk(config('cms.disk'))->assertMissing($video);
    Storage::disk(config('cms.disk'))->assertMissing($thumbnail);
});
