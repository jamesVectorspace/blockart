<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('is_active_database_backup_sidebar')) {
    
    function is_active_database_backup_sidebar(string $routeName) : bool
    {
        return Route::currentRouteName() === $routeName;
    }
}