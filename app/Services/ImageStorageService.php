<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageStorageService
{
    /**
     * Upload an image/file to Cloudinary (or fallback to local disk)
     */
    public static function upload($file, string $folder = 'portfolio'): string
    {
        $cloudUrl = config('cloudinary.cloud_url');
        $hasCloudinary = (!empty($cloudUrl) && !str_starts_with($cloudUrl, 'cloudinary://:@'))
            || (!empty(config('filesystems.disks.cloudinary.cloud')) && !empty(config('filesystems.disks.cloudinary.key')));

        if ($hasCloudinary) {
            try {
                $filePath = is_string($file) ? $file : $file->getRealPath();
                $result = Cloudinary::uploadApi()->upload($filePath, [
                    'folder' => $folder,
                    'resource_type' => 'auto',
                ]);
                if (!empty($result['secure_url'])) {
                    return $result['secure_url'];
                }
            } catch (\Throwable $e) {
                Log::warning('Cloudinary upload failed, falling back to local: ' . $e->getMessage());
            }
        }

        // Fallback to standard Laravel public storage
        return is_string($file) ? $file : $file->store($folder, 'public');
    }

    /**
     * Delete an image from Cloudinary or local disk
     */
    public static function delete(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            if (str_contains($path, 'res.cloudinary.com')) {
                try {
                    $parts = explode('/upload/', $path);
                    if (isset($parts[1])) {
                        $afterUpload = preg_replace('/^v\d+\//', '', $parts[1]);
                        $publicId = pathinfo($afterUpload, PATHINFO_DIRNAME) . '/' . pathinfo($afterUpload, PATHINFO_FILENAME);
                        $publicId = ltrim($publicId, './');
                        Cloudinary::uploadApi()->destroy($publicId);
                    }
                } catch (\Throwable $e) {
                    Log::warning('Cloudinary delete failed: ' . $e->getMessage());
                }
            }
            return;
        }

        Storage::disk('public')->delete($path);
    }

    /**
     * Resolve the public URL for an image (handles Cloudinary URL, full URL, or local storage path)
     */
    public static function url(?string $path, ?string $default = null): ?string
    {
        if (empty($path)) {
            return $default;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
