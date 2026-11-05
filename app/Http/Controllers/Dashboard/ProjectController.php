<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Support\Media;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Project::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(20);

        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        Project::query()->create($this->data($request));

        return redirect()
            ->route('dashboard.projects.index')
            ->with('status', 'Project berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($this->data($request, $project));

        return redirect()
            ->route('dashboard.projects.index')
            ->with('status', 'Project berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        Media::delete($project->video_path);
        Media::delete($project->thumbnail_path);

        $project->delete();

        return redirect()
            ->route('dashboard.projects.index')
            ->with('status', 'Project berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function data(ProjectRequest $request, ?Project $project = null): array
    {
        $data = $request->safe()->only(['title', 'subtitle', 'type_label', 'sort_order']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['is_published'] = $request->boolean('is_published');
        $data['video_path'] = $this->resolveMedia($request, 'video_file', 'video_url', 'projects/videos', $project?->video_path);
        $data['thumbnail_path'] = $this->resolveMedia($request, 'thumbnail_file', 'thumbnail_url', 'projects/thumbnails', $project?->thumbnail_path);

        return $data;
    }

    private function resolveMedia(ProjectRequest $request, string $fileField, string $urlField, string $directory, ?string $oldPath): ?string
    {
        if ($request->hasFile($fileField)) {
            $file = $request->file($fileField);

            if ($file instanceof UploadedFile) {
                return Media::store($file, $directory, $oldPath);
            }
        }

        $newPath = $request->input($urlField);
        $newPath = is_string($newPath) ? trim($newPath) : null;

        if ($oldPath !== null && $oldPath !== $newPath) {
            Media::delete($oldPath);
        }

        return $newPath !== null && $newPath !== '' ? $newPath : null;
    }
}
