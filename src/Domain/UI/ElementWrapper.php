<?php
namespace Genesizadmin\GenesizCore\Domain\UI;

trait ElementWrapper {

    public array $children = [];

     public static function wrap(array $components)
    {
        return new static($components);
    }

    public function getChildren()
    {
        return $this->children;
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
