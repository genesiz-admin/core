<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Menu;

class NavBar extends SideMenu
{


    public function render()
    {
            $storeKey = '_navbar';
            $current = inertia()->getShared($storeKey, []);
            inertia()->share($storeKey, array_merge($current, $this->toArray()));
    }


}
