<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Menu;


class SideMenu
{
    protected bool $isVisible = true;

    protected array $menus;

    protected string $visiblePath = '';

    public static function make($key, array $menus = [])
    {
        return new static($key,$menus);
    }

    public function __construct(protected string $key, array $items)
    {
        $this->menus = $this->buildMenuitems($items);
    }

    public function visible(mixed $value)
    {
        if (is_callable($value)) {
            $this->isVisible = $value();
        } else {
            $this->isVisible = $value;
        }

        return $this;
    }

    public function visibleOnUrl($path)
    {
        $path = str($path)->ltrim('/');

        $this->visiblePath = $path;

        $this->visible(function () use ($path) {
            return request()->is($path);
        });

        return $this;
    }

    public function subMenu($label, $icon = null, array $menuItems = [])
    {
        if (empty($menuItems)) {
            return $this;
        }

        $this->menus[] = [
            'label' => $label,
            'icon' => $icon,
            'url' => null,
            'children' => $this->buildMenuitems($menuItems),
        ];

        return $this;
    }

    public function item($label,$url, $icon = null)
    {
        $this->menus[] = [
            'label' => $label,
            'icon' => $icon,
            'url' => $url,
        ];

        return $this;
    }

    private function buildMenuitems(array $items)
    {
        return array_map(function ($el) {
            return $el->toArray();
        }, $items);
    }

    public function link($label, $url, $icon = null)
    {
        $this->menus[] = [
            'label' => $label,
            'icon' => $icon,
            'menus' => null,
            'url' => $url,
            'isActive' => request()->is($this->visiblePath),
        ];

        return $this;
    }

    public function render()
    {

        if ($this->isVisible) {
            MenuContainer::setSidebarMenus($this->key, $this->toArray());
        }
    }

    public function append()
    {
        MenuContainer::appendMenu($this->key, $this->toArray());
    }

    public function prepend()
    {
        MenuContainer::prependMenu($this->key, $this->toArray());
    }

    public function insert(int $index): void
    {
        MenuContainer::insertMenu($this->key, $this->toArray(), $index);
    }

    public function toArray()
    {
        return $this->menus;
    }

    public function dd()
    {
        dd($this->toArray());
    }
}
