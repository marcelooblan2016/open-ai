<?php

return [
    'api_key' => env('OPENAI_API_KEY'),
    'default_model' => env('OPENAI_DEFAULT_MODEL', 'gpt-3.5-turbo'),
];