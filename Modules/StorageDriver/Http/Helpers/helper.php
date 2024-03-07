<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('envPath')) {
    /**
     * Get the env file path.
     *
     * @return string
     */
    function envPath()
    {
        return base_path('.env');
    }
}

if (!function_exists('isDriverActive')) {
    /**
     * Get the active object storage name
     *
     * @return bool of active object storage
     */
    function isDriverActive($name)
    {
        try {
            return Storage::disk($name)->url('public/uploads') != "/public/uploads";
        } catch (\Throwable $th) {
            return false;
        }
    }
}

