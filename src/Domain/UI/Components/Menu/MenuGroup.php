<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\Menu;

class MenuGroup
{
    public static function make($label, array $children = [])
    {
        return new static($label,$children);
    }

    public function __construct(private string $label,private $children)
    {

    }

    public function toArray()
    {
        return [
            'key' => microtime(),
            'type' => 'group',
            'label' => $this->label,
            'children' => array_map(fn($el) => $el->toArray(),$this->children)
        ];
    }
}
