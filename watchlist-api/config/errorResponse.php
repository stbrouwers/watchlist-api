<?php

$generic = config('errorGeneric');

return [
    'Identifier' => [
        'INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided identifier is invalid.',
        ]
    ],

    'Watchlist' => [
        'LIMIT_INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided limit is invalid.'
        ],
        'LIMIT_VALUE' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'Please use a limit between 1 and 10.'
        ],

        'OFFSET_INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided offset is invalid.'
        ],
        'OFFSET_VALUE' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'Ur offset is going in the negative buddy better get ur pasted shit code checked out.'
        ],

    ],
];
