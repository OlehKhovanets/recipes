<?php

return [
    'redis' => [
        'redis',
        'database',
        'memcached'
    ],
    'database' => [
        'mysql',
        'redis',
        'database',
        'memcached',
    ],
    'git' => [
        'git'
    ],
    'memcached' => [
        'memcached',
        'database',
        'redis'
    ],
];
