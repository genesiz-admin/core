<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Menu;

class MenuItem
{
    private string $icon = '';
    private bool $visible = true;
    private string $method = 'get';

    public static function make($label, $url, array $children = [])
    {
        return new static($label, $url, $children);
    }

    public function __construct(private string $label, private string $url, private $children)
    {
    }

    public function icon(string $name)
    {
        $this->icon = $name;
        return $this;
    }

    public function asPost()
    {
        $this->method = 'post';
        return $this;
    }

    public function toArray()
    {
        return [
            'key' => microtime(),
            'label' => $this->label,
            'url' => $this->url,
            'method' => $this->method,
            'iconName' => $this->icon . ' text-lg',
            'children' => empty($this->children) ? null : $this->buildMenuitems($this->children)
        ];
    }

    private function buildMenuitems(array $items)
    {
        return array_map(function ($el) {
            return $el->toArray();
        }, $items);
    }

    public function setVisibility(callable|bool $value)
    {
        if(is_callable($value)){
            $value = call_user_func($value);
        }
        $this->visible = $value;
        return $this;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }
}
