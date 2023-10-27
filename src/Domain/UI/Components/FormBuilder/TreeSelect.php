<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;
use Genesizadmin\GenesizCore\Domain\UI\HasOptions;

class TreeSelect extends FormInput {

    protected $component = 'a-tree-select';

    public function options($values)
    {
        $this->setAttr('tree-data',$values);
        return $this;
    }



}
