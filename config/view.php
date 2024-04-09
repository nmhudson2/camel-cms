<?php

return [
    'paths' => [
        base_path('resources/views'),
        public_path('includes/themes/' . env('ACTIVE_THEME', 'default') . '/templates'),
    ],
];
