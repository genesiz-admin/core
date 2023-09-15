<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait WithInertia {

    protected static function mergeShareData($key, $value)
    {
        inertia()->share($key, array_merge_recursive(inertia()->getShared($key, []), $value));
    }

}
