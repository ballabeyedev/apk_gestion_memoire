<?php

return [
    'defaults' => [
        'guard' => 'utilisateur',
        'passwords' => 'utilisateurs',
    ],

    'guards' => [
        'utilisateur' => [
            'driver' => 'session',
            'provider' => 'utilisateurs',
        ],
    ],

    'providers' => [
        'utilisateurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Utilisateur::class,
            'table' => 'utilisateurs',
        ],
    ],
];
