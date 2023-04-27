<?php

return [
    200 => [
        'message' => 'OK',
        'description' => 'The request was successful'
    ],
    201 => [
        'message' => 'Created',
        'description' => 'The resource was created successfully'
    ],
    202 => [
        'message' => 'Accepted',
        'description' => 'The request has been accepted for processing'
    ],
    204 => [
        'message' => 'No Content',
        'description' => 'The request was successful, but there is no representation to return'
    ],
    301 => [
        'message' => 'Moved Permanently',
        'description' => 'The requested resource has been moved permanently to a new URL'
    ],
    302 => [
        'message' => 'Found',
        'description' => 'The requested resource has been found and temporarily moved to a different URL'
    ],
    304 => [
        'message' => 'Not Modified',
        'description' => 'The requested resource has not been modified since the last time it was requested'
    ],
    400 => [
        'message' => 'Bad Request',
        'description' => 'The request could not be understood or was missing required parameters'
    ],
    401 => [
        'message' => 'Unauthorized',
        'description' => 'Authentication failed or user does not have permissions for the requested operation'
    ],
    403 => [
        'message' => 'Forbidden',
        'description' => 'Access to the requested resource is forbidden'
    ],
    404 => [
        'message' => 'Not Found',
        'description' => 'The requested resource could not be found'
    ],
    405 => [
        'message' => 'Method Not Allowed',
        'description' => 'The HTTP method used is not allowed for the requested resource'
    ],
    409 => [
        'message' => 'Conflict',
        'description' => 'The request could not be completed due to a conflict with the current state of the resource'
    ],
    500 => [
        'message' => 'Internal Server Error',
        'description' => 'An error occurred on the server'
    ],
    501 => [
        'message' => 'Not Implemented',
        'description' => 'The requested functionality is not supported'
    ],
    503 => [
        'message' => 'Service Unavailable',
        'description' => 'The server is currently unavailable (overloaded or down for maintenance)'
    ]
];
