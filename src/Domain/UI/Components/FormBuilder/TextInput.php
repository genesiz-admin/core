<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class TextInput extends FormInput
{

    protected $component = 'a-input';

    public function prefix($value)
    {
        $this->setAttr('addon-before', $value);
        return $this;
    }

    public function suffix($value)
    {
        $this->setAttr('addon-after', $value);
        return $this;
    }

    public function placeholder($value)
    {
        $this->setAttr('placeholder', $value);
        return $this;
    }

    public function max($value, $showLabel = true)
    {
        $this->setAttr('maxlength', $value);
        $this->setAttr('show-count', $showLabel);
        return $this;
    }

    public function type($value)
    {
        $this->setAttr('type', $value);
        return $this;
    }
}
