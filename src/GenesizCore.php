<?php

namespace Genesizadmin\GenesizCore;

use Genesizadmin\GenesizCore\Domain\UI\Menu\MenuContainer;

class GenesizCore
{
    private static array $coreData = [];

    public static function authRoutes()
    {
        require __DIR__ . './../routes/auth.php';
    }
}
