<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class ActionButton
{
    use WithInertia;

    public static function make($label, $action, $style, $icon = null): void
    {
        self::mergeShareData('heading', [
            'actions' => [
                [
                    'type' => 'a',
                    'label' => $label,
                    'action' => $action,
                    'icon' => $icon,
                    'class' => $style,
                ],
            ],
        ]);
    }
}
