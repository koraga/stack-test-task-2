<?php

use App\Core\Controllers;

/**
 * Routes
 *
 * 'REQUEST METHOD' => [
 *      'route' => [ Controller, Controller method ]
 * ]
 *
 */
return [
    'GET' => [
        'api/books' => [Controllers\ApiBooksController::class, 'index'],

        '' => [Controllers\HomeController::class, 'index'],
    ],
    'POST' => [
        'api/books' => [Controllers\ApiBooksController::class, 'store']
    ],
    'PATCH' => [
        'api/books/([0-9]+)' => [Controllers\ApiBooksController::class, 'update']
    ],
    'PUT' => [
        'api/books/([0-9]+)' => [Controllers\ApiBooksController::class, 'update']
    ],
    'DELETE' => [
        'api/books/([0-9]+)' => [Controllers\ApiBooksController::class, 'destroy']
    ]
];