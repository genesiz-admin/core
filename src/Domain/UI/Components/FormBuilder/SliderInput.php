<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;

class SliderInput extends FormInput {
    protected $component = 'a-slider';

    public function min(int $value)
    {
        $this->setAttr('min',$value);
        return $this;
    }

    public function max(int $value)
    {
        $this->setAttr('max',$value);
        return $this;
    }

    public function step(int|float $value)
    {
        $this->setAttr('step',$value);
        return $this;
    }

    public function vertical()
    {
        $this->setAttr('vertical',true);
        return $this;
    }

    public function reverse()
    {
        $this->setAttr('reverse',true);
        return $this;
    }
    public function range()
    {
        $this->setAttr('range',true);
        return $this;
    }

    public function marks(array $values)
    {
        $this->setAttr('marks',$values);
        return $this;
    }
}
