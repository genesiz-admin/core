<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

use Genesizadmin\GenesizCore\Domain\UI\Components\ActionButton;
use Genesizadmin\GenesizCore\Domain\UI\Components\Heading;
use Genesizadmin\GenesizCore\Domain\UI\Components\NavigateBack;

trait PageFeatures
{
    public function pageHeading($title, $subtitle = ''): void
    {
        Heading::make($title, $subtitle);
    }

    public function navigateBack($url = null): void
    {
        NavigateBack::url($url);
    }

    public function pagePrimaryAction($label, $action, $icon = null): void
    {
        ActionButton::make($label, $action, 'btn btn-primary', $icon);
    }

    public function pageSecondaryAction($label, $action, $icon = null): void
    {
        ActionButton::make($label, $action, 'btn btn-secondary', $icon);
    }
}
