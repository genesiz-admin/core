<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;
use Genesizadmin\GenesizCore\Domain\UI\InteractsWithForm;

class InputGroup extends BaseComponent {

    use InteractsWithForm;

    public array $children = [];

    protected $component ='a-input-group';

    public function __construct($components)
    {
        $this->children = $components;
        $this->setAttr('compact',true);
    }

    public static function wrap(array $components)
    {
        return new static($components);
    }

    public function toArray()
    {
        return [
            'is' => $this->component,
            'name' => 'po6545656456',
            'attrs' => $this->getAttrs(),
            'parentAttrs' => [],
            'children' => array_map(fn($item) => $item->toArray(),$this->children)
        ];
    }

}
