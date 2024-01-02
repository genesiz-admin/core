<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\AdjustWidth;

class NumberInput extends FormInput {


    protected $component ='a-input-number';

    public function prefix($value)
    {
        $this->setAttr('addon-before',$value);
        return $this;
    }

    public function suffix($value)
    {
        $this->setAttr('addon-after',$value);
        return $this;
    }

    public function placeholder($value)
    {
        $this->setAttr('placeholder',$value);
        return $this;
    }

    public function max(int $value)
    {
        $this->setAttr('max',$value);
        return $this;
    }

    public function min(int $value)
    {
        $this->setAttr('min',$value);
        return $this;
    }

    public function step(int|float $value)
    {
        $this->setAttr('step',$value);
        return $this;
    }

    public function hideControls()
    {
        $this->setAttr('controls',false);
        return $this;
    }

}
