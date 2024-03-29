<?php

return [
    'name' => 'Recipes',
    'manifest' => [
        'name' => 'Recipes',
        'short_name' => 'Recipes',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#a2cffc',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> '#a2cffc',
        'icons' => [
            '72x72' => [
                'path' => '/web/images/pwa/icons/icon72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/web/images/pwa/icons/icon96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/web/images/pwa/icons/icon128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/web/images/pwa/icons/icon144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/web/images/pwa/icons/icon150.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/web/images/pwa/icons/icon192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/web/images/pwa/icons/icon256.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/web/images/pwa/icons/icon512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/web/images/pwa/icons/icon512.png',
            '750x1334' => '/web/images/pwa/icons/icon512.png',
            '828x1792' => '/web/images/pwa/icons/icon512.png',
            '1125x2436' => '/web/images/pwa/icons/icon512.png',
            '1242x2208' => '/web/images/pwa/icons/icon512.png',
            '1242x2688' => '/web/images/pwa/icons/icon512.png',
            '1536x2048' => '/web/images/pwa/icons/icon512.png',
            '1668x2224' => '/web/images/pwa/icons/icon512.png',
            '1668x2388' => '/web/images/pwa/icons/icon512.png',
            '2048x2732' => '/web/images/pwa/icons/icon512.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/web/images/pwa/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
