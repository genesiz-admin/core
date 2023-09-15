<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class NavigateBack
{
    use WithInertia;

    public static function url($url = null): void
    {
        self::mergeShareData('heading', [
            'backUrl' => $url ?: url()->previous(),
        ]);
    }
}
