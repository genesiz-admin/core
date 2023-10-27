<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class TextareaInput extends FormInput {

    protected $component ='a-textarea';

    public function autosize($enable = true)
    {
        $this->setAttr('auto-size',$enable);

        return $this;
    }

    public function rows($amount)
    {
        $this->setAttr('rows',$amount);

        return $this;
    }

}
