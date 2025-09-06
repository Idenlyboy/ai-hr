<?php

return [
    'service_url' => env('WEBHOOK_SERVICE_URL', 'http://localhost:8000'),
    'secret_token' => env('WEBHOOK_SECRET_TOKEN'),

    'endpoints' => [
        'rank_resumes' => '/api/v1/webhook/rank-resumes',
        'analyze-interview' => '/api/v1/webhook/analyze-interview',
    ],
];

