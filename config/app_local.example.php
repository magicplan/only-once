<?php

return [
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),
    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],
    'Datasources' => [
        'default' => [
            'url' => env('DATABASE_URL', null),
        ],
        'test' => [
            'url' => env('DATABASE_TEST_URL', null),
        ],
    ],
];
