<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components;

abstract class BaseComponent {

    private $attrs,$parentAttrs;


    protected $component ='a-input';

    public static function make($name, $key = null)
    {
        return new static($name,$key);
    }

    public function __construct(private string $name, private ?string $key = null)
    {
        $this->setParentAttr('label',str($name)->title);

        $this->key = $key ?? str($name)->snake;
    }

    protected function setParentAttr($key,$value)
    {
        $this->parentAttrs[$key] = $value;
    }

    protected function setAttr($key,$value)
    {
        $this->attrs[$key] = $value;
    }

    public function getAttrs()
    {
        return $this->attrs;
    }



    public function toArray()
    {
        return [
            'is' => $this->component,
            'name' => $this->key,
            'attrs' => $this->attrs,
            'parentAttrs' => $this->parentAttrs,
        ];
    }
}
