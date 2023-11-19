<?php

return [
    'open_ai' => [
        'api_key' => env('MRX_OPEN_AI_API_KEY'),
        'default_model' => env('MRX_OPEN_AI_DEFAULT_MODEL', 'gpt-3.5-turbo'),
    ],
];