<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('cms.defaults', []) as $key => $value) {
            Setting::query()->firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $alreadySeeded = Setting::query()->where('key', 'cms_seeded')->exists();

        if (! $alreadySeeded && Project::query()->doesntExist()) {
            foreach (config('cms.projects', []) as $project) {
                Project::query()->create($project);
            }
        }

        Setting::query()->firstOrCreate(
            ['key' => 'cms_seeded'],
            ['value' => '1']
        );
    }
}
