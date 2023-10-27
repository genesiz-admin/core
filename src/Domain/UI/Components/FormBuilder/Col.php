<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;
use Genesizadmin\GenesizCore\Domain\UI\ElementWrapper;
use Genesizadmin\GenesizCore\Domain\UI\InteractsWithForm;

class Col extends BaseComponent {

    use InteractsWithForm, ElementWrapper;

    protected $component ='a-col';

        public function getComponentName()
    {
        return $this->component;
    }

    public function __construct($components)
    {
        $this->children = $components;
        $this->setAttr('span',24);
    }

    public function setColumnWidth($value)
    {
        $this->setAttr('span',$value);
        return $this;
    }
}
