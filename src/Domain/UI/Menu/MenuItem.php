<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Menu;

class MenuItem
{
    public static function make($label, $url, array $children = [])
    {
        return new static($label,$url,$children);
    }

    public function __construct(private string $label, private string $url, private $children)
    {

    }

    public function toArray()
    {
        return [
            'label' => $this->label,
            'url' => $this->url,
            'children' => empty($this->children) ? null : $this->buildMenuitems($this->children)
        ];
    }

     private function buildMenuitems(array $items)
    {
        return array_map(function ($el) {
            return $el->toArray();
        }, $items);
    }
}
