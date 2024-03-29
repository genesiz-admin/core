<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class Heading
{
    use WithInertia;

    public static function make($title, $subtitle = '', $icon = null): void
    {
        self::mergeShareData('_heading', [
            'title' => $title,
            'subtitle' => $subtitle,
            'icon' => $icon,
        ]);
    }
}
