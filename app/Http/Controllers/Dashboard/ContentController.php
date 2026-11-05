<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Setting;
use App\Support\Media;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContentController extends Controller
{
    public function edit(): View
    {
        $settings = array_merge(
            config('cms.defaults', []),
            Setting::query()
                ->pluck('value', 'key')
                ->filter(fn ($value) => $value !== null)
                ->all()
        );

        return view('dashboard.content.edit', compact('settings'));
    }

    public function update(ContentRequest $request): RedirectResponse
    {
        $values = $request->validated('settings') ?? [];

        foreach (array_keys(config('cms.defaults', [])) as $key) {
            if (! array_key_exists($key, $values)) {
                continue;
            }

            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => (string) ($values[$key] ?? '')]
            );
        }

        if ($request->hasFile('hero_thumbnail_file')) {
            $oldPath = Setting::query()->find('hero_thumbnail')?->value;
            $path = Media::store($request->file('hero_thumbnail_file'), 'content', $oldPath);

            Setting::query()->updateOrCreate(
                ['key' => 'hero_thumbnail'],
                ['value' => $path]
            );
        }

        if ($request->hasFile('about_photo_file')) {
            $oldPath = Setting::query()->find('about_photo')?->value;
            $path = Media::store($request->file('about_photo_file'), 'content', $oldPath);

            Setting::query()->updateOrCreate(
                ['key' => 'about_photo'],
                ['value' => $path]
            );
        }

        return redirect()
            ->route('dashboard.content.edit')
            ->with('status', 'Konten berhasil diperbarui.');
    }
}
