<?php

return [
    'service_url' => env('AI_SERVICE_URL', 'http://localhost:8000'),
    'timeout' => env('AI_TIMEOUT', 30),
    'api_key' => env('AI_API_KEY'),

    'endpoints' => [
        'generate_skills' => '/api/generate-skills',
        'evaluate_answers' => '/api/evaluate-answers',
    ],
];

