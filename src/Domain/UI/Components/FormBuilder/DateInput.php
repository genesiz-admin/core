<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\AdjustWidth;
use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;

class  DateInput extends FormInput {


    protected $component = 'a-date-picker';

    public function range()
    {
        $this->component = 'a-range-picker';
        return $this;
    }

    public function asDateObject()
    {
        $this->setParentAttr('isDateObject', true);
        return $this;
    }

    public function weekOnly()
    {
        $this->setAttr('picker','week');
        return $this;
    }

    public function monthOnly()
    {
        $this->setAttr('picker','month');
        return $this;
    }

    public function quarterOnly()
    {
        $this->setAttr('picker','quarter');
        return $this;
    }

    public function yearOnly()
    {
        $this->setAttr('picker','year');
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

    public function showTime()
    {
        $this->setAttr('show-time', true);
        return $this;
    }
}
