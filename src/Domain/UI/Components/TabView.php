<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

abstract class TabView
{
    public array $data;

    public static array $shared;

    protected int $order = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
    }

    public function visible(): bool
    {
        return true;
    }

    public static function inject(string $key, $tab)
    {
        static::$shared[$key][] = $tab;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
