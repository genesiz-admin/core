<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\Menu;

class MenuItem
{
    private string $icon = '';

    public static function make($label, $url, array $children = [])
    {
        return new static($label,$url,$children);
    }

    public function __construct(private string $label, private string $url, private $children)
    {

    }

    public function icon(string $name)
    {
        $this->icon = $name;
        return $this;
    }

    public function toArray()
    {
        return [
            'key' => microtime(),
            'label' => $this->label,
            'url' => $this->url,
            'iconName' => $this->icon.' text-lg',
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
