<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\AdjustWidth;
use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;

class  TimeInput extends FormInput {

    protected $component = 'a-time-picker';

    public function range()
    {
        $this->component = 'a-time-range-picker';
        return $this;
    }

    public function hideBorders()
    {
        $this->setAttr('bordered', false);
        return $this;
    }

    public function format($dateFormat)
    {
        $this->setAttr('format',$dateFormat);
        return $this;
    }

    public function setValue($value)
    {
        $this->setAttr('value',$value);
        return $this;
    }

}
