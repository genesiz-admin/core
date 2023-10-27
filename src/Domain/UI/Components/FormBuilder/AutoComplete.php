<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;

class AutoComplete extends FormInput {


    protected $component = 'g-auto-complete';


    public function url($url, $key = 'q')
    {
        $this->setAttr('url',$url);
        $this->setAttr('key',$key);

        return $this;
    }

}
