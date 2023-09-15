<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class Heading
{
    use WithInertia;

    public static function make($title, $subtitle = ''): void
    {
        self::mergeShareData('heading', [
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }
}
