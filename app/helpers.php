<?php

use App\Services\ImageStorageService;

if (!function_exists('image_url')) {
    function image_url(?string $path, ?string $default = null): ?string
    {
        return ImageStorageService::url($path, $default);
    }
}
