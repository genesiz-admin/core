<?php


namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class Drawer {
    use WithInertia;

    private array $attr = [];

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {

    }

    public function title($text)
    {
        $this->attr['title'] = $text;
        return $this;
    }

    public function size($size)
    {
        $this->attr['size'] = $size;
        return $this;
    }

    public function placement($location)
    {
        $this->attr['placement'] = $location;
        return $this;
    }

    public function setForm($name)
    {
        $this->attr['form'] = $name;
        return $this;
    }

    public function setFormClass($form)
    {
        $this->attr['blueprint'] = $form->toArray();
        return $this;
    }

    public function toArray()
    {
        return $this->attr;
    }

    public function show()
    {
        session()->flash('_drawer', $this->toArray());
    }
}
