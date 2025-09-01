<?php

return [
    'hunter' => [
        'entities' => [
            'user' => ['update'],
            'resume' => ['store', 'update', 'paginate', 'archive'],
            'vacation' => ['paginate', 'respond'],
            'file' => ['store', 'destroy'],
        ],
        'access' => 'limited',
    ],
    'hr' => [
        'entities' => [
            'user' => ['update', 'paginate'],
            'resume' => ['paginate', 'respond'],
            'vacation' => ['store', 'update', 'paginate', 'archive'],
            'file' => ['store', 'destroy'],
        ],
        'access' => 'limited',
    ],
    'admin' => [
        'entities' => [],
        'access' => 'full',
    ],
];
