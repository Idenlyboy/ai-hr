<?php

return [
    'hunter' => [
        'routes' => [
            // '/route/{id}/'
            '/profile/',
            '/hits/',
            '/interview/hit/{id}/',
        ],
        'access' => 'limited',
    ],
    'hr' => [
        'routes' => [
            // '/route/{id}/'
            '/profile/',
            '/vacation/{id}/',
            '/vacation/edit/',
            '/vacation/edit/{id}/',
            '/hits/',
        ],
        'access' => 'limited',
    ],
    'admin' => [
        'routes' => [],
        'access' => 'full',
    ],
];
