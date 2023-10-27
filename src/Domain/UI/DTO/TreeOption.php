<?php

namespace Genesizadmin\GenesizCore\Domain\UI\DTO;

class TreeOption {


    public static function make($label,$value, $children = [])
    {
        return [
            'label' => $label,
            'value' => $value,
            'children' => $children
        ];
    }
}
