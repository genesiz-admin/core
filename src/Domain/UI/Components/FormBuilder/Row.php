<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;
use Genesizadmin\GenesizCore\Domain\UI\ElementWrapper;
use Genesizadmin\GenesizCore\Domain\UI\InteractsWithForm;

class Row extends BaseComponent {

    use InteractsWithForm, ElementWrapper;

    protected $component = 'a-row';

    public function __construct($components)
    {
        $this->children = array_map(fn($itm) => Col::wrap([$itm])->setColumnWidth($itm->getAttr('col-span',24)),$components);
        $this->setAttr('gutter', 15);
    }

        public function getComponentName()
    {
        return $this->component;
    }

    public function toArray()
    {
        return [
            'is' => $this->component,
            'name' => 'po6545656456',
            'attrs' => $this->getAttrs(),
            'children' => array_map(fn($item) => $item->toArray() ,$this->children)
        ];
    }
}
