<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Inertia\Inertia;

class BreadCrumb {

    private $data = [];

    public static function make()
    {
        return new static();
    }

    public function path($label,$url = null)
    {
        $this->data[] = [
                'url' => $url,
                'name' => $label
        ];
        return $this;
    }

    public function render()
    {
        Inertia::share('_crumbs',$this->data);
    }
}
