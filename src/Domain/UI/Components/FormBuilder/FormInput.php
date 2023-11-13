<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\HasSizes;
use Genesizadmin\GenesizCore\Domain\UI\InteractsWithForm;

abstract class  FormInput {

    use InteractsWithForm, HasSizes;

    private $attrs,$parentAttrs, $meta = [];

    protected $component ='a-input';

    public static function make($name, $key = null)
    {
        return new static($name,$key);
    }

    public function getComponentName()
    {
        return $this->component;
    }

    public function __construct(private string $name, private ?string $key = null)
    {
        $this->setParentAttr('label',str($name)->title);
        $this->setAttr('placeholder', "Enter ".str($name)->lower);

        $this->key = $key ?? str($name)->snake;
    }

    protected function setParentAttr($key,$value)
    {
        $this->parentAttrs[$key] = $value;
    }

    public function setAttr($key,$value)
    {
        $this->attrs[$key] = $value;
        return $this;
    }

    public function width($value)
    {
        $this->setAttr('col-span',$value);
        return $this;
    }

    public function getAttr($key, $default = null)
    {
        return $this->attrs[$key] ?? $default;
    }

    public function setStyle($value)
    {
        $this->setAttr('style',$value);
        return $this;
    }

    public function hideIfTarget($target,$value)
    {
        $this->meta['visibility'] = [
            'visible' => false,
            'target' => $target,
            'value' => $value,
        ];

        return $this;
    }

    public function showIfTarget($target,$value)
    {
        $this->meta['visibility'] = [
            'visible' => true,
            'target' => $target,
            'value' => $value,
        ];

        return $this;
    }

    public function wrapKeyName($name)
    {
        $this->key = "{$name}[{$this->key}]";

        return $this;
    }


    public function toArray()
    {
        return [
            'is' => $this->component,
            'name' => $this->key,
            'attrs' => $this->attrs,
            'parentAttrs' => $this->parentAttrs,
            'meta' => $this->meta
        ];
    }

}
