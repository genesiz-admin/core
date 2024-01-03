<?php

// config for Genesizadmin/GenesizCore

use Genesizadmin\GenesizCore\Domain\Enums\Placement;

return [
    // toasts
    'toast' => [
        'placement' => Placement::BottomRight,
        'duration' => 3
    ],

    'auth' => [
        'guard' => 'web'
    ]
];
