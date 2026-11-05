<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

final class Media
{
    public static function disk(): string
    {
        return (string) config('cms.disk', 'public');
    }

    public static function url(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '/'])) {
            return $path;
        }

        return Storage::disk(self::disk())->url($path);
    }

    public static function store(UploadedFile $file, string $directory, ?string $oldPath = null): string
    {
        $name = Str::uuid()->toString().'.'.strtolower($file->getClientOriginalExtension());

        $path = Storage::disk(self::disk())->putFileAs(
            trim($directory, '/'),
            $file,
            $name
        );

        if (! is_string($path) || $path === '') {
            throw new RuntimeException('Gagal mengunggah file.');
        }

        self::delete($oldPath);

        return $path;
    }

    public static function delete(?string $path): void
    {
        if ($path === null || $path === '') {
            return;
        }

        if (Str::startsWith($path, ['http://', 'https://', '/'])) {
            return;
        }

        Storage::disk(self::disk())->delete($path);
    }
}
