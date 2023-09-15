<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class PageTitle {

    use WithInertia;

    public static function make($title): void
    {
        self::mergeShareData('heading', [
            'headTitle' => $title.' - '.config('app.name'),
        ]);
    }

}
