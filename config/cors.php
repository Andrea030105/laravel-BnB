<?php

return [
    'paths' => ['api/*'],                  // applica CORS a tutte le route API

    'allowed_methods' => ['*'],            // GET, POST, PUT, DELETE, ecc.

    'allowed_origins' => [env('FRONTEND_URL'), 'http://localhost:5173'],  // porta di default di Vite/Vue

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
