<?php

$generic = config('errorGeneric');

return [
    'Identifier' => [
        'INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided identifier is invalid.',
        ],
        'NULL' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The request did not contain an identifier.'
        ],

        'REFERENCE_NULL' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The request did not contain a reference parameter.',
        ],
        'REFERENCE_EXISTS' => [
            'code' => 409,
            'error_context' => $generic[409],
            'detail' => 'The provided reference has already been assigned to another identifier.'
        ],
        'REFERENCE_VIOLATION' => [
            'code' => 409,
            'error_context' => $generic[409],
            'detail' => 'The provided reference is incorrect.'
        ],
    ],

    'Watchlist' => [
        'NAME_NULL' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The request did not contain a name parameter.'
        ],

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

        'PRIVATE_INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided private parameter is invalid. It should be either true/false or 1/0.'
        ],
        'HIDDEN_INVALID' => [
            'code' => 400,
            'error_context' => $generic[400],
            'detail' => 'The provided hidden parameter is invalid. It should be either true/false or 1/0.'
        ],

    ],
];
