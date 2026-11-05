<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'subtitle', 'type_label', 'video_path', 'thumbnail_path', 'sort_order', 'is_published'])]
class Project extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function videoUrl(): ?string
    {
        return Media::url($this->video_path);
    }

    public function thumbnailUrl(): ?string
    {
        return Media::url($this->thumbnail_path);
    }

    public function videoMime(): string
    {
        return match (strtolower(pathinfo((string) $this->video_path, PATHINFO_EXTENSION))) {
            'webm' => 'video/webm',
            'mov' => 'video/quicktime',
            default => 'video/mp4',
        };
    }
}
