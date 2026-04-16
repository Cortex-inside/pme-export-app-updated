<?php

namespace PMEexport\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadStorage
{
    public static function disk(): string
    {
        $disk = config('filesystems.uploads_disk', 's3');

        if ($disk === 's3' && empty(config('filesystems.disks.s3.bucket'))) {
            return 'public';
        }

        return $disk;
    }

    public static function storePublicly($file, string $directory): string
    {
        return $file->storePublicly($directory, self::disk());
    }

    public static function url(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return Storage::disk(self::disk())->url(ltrim($path, '/'));
    }
}
