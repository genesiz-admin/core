<?php

namespace Genesizadmin\GenesizCore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Genesizadmin\GenesizCore\GenesizCore
 */
class GenesizCore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Genesizadmin\GenesizCore\GenesizCore::class;
    }
}
