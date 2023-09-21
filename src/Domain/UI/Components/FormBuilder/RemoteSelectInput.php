<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class RemoteSelectInput extends FormInput {

    protected $component = 'a-remote-select';

    public function url($url, $key = 'q')
    {
        $this->setAttr('url',$url);
        $this->setAttr('key',$key);

        return $this;
    }

}
