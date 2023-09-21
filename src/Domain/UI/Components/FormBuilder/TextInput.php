<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class TextInput extends FormInput {

    protected $component ='a-input';

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

}
