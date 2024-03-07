<?php

return [
    'name' => 'DatabaseBackup',
    'schedule_type' => env('DATABASE_SCHEDULE_TYPE', 'daily'),
    'is_database_automated_backup' => env('IS_DATABASE_AUTOMATED_BACKUP', false),
    'schedule_type_value' => [
        'daily',
        'weekly',
        'monthly',
        'yearly'
    ],
    'storage' => env('DATABASE_STORAGE', ['local']),
    'available_storage' => [
        'local', 
        'google', 
        'dropbox'
    ],
    'app_name' => env('APP_NAME', 'Artifism'),

];
