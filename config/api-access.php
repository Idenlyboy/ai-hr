<?php

return [
    'hunter' => [
        'entities' => [
            'user' => ['update'],
            'resume' => ['get', 'store', 'update', 'paginate', 'archive'],
            'vacation' => ['paginate', 'hunterApply'],
            'hit' => ['updateStatus'],
            'file' => ['store', 'destroy'],
        ],
        'access' => 'limited',
    ],
    'hr' => [
        'entities' => [
            'user' => ['update', 'paginate'],
            'ai' => ['vacationProcess'],
            'resume' => ['paginate', 'respond'],
            'vacation' => ['store', 'update', 'paginate', 'archive'],
            'hit' => ['updateStatus'],
            'file' => ['store', 'destroy'],
        ],
        'access' => 'limited',
    ],
    'admin' => [
        'entities' => [],
        'access' => 'full',
    ],
];
