<?php

$generic = config('errorGeneric');

return [
    'Identifier' => [
        'INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided identifier is invalid',
        ]
    ],

    'Watchlist' => [

    ],
];
