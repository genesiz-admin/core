<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class ActionButton
{
    use WithInertia;

    public static function make($label, $url, $type = 'default' ): void
    {
        self::mergeShareData('_actions', [

                [
                    'component' => 'g-button',
                    'label' => $label,
                    'attrs' => [
                        'is' => 'g-button',
                        'type' => $type,
                        'href' => $url
                    ]
                ],
            ],
        );
    }
}
