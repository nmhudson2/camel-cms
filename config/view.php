<?php

return [
    'paths' => [
        base_path('resources/views'),
        storage_path('themes/' . env('ACTIVE_THEME', 'default') . '/templates')
    ]
];
