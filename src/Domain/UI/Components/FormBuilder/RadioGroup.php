<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\Components\BaseComponent;
use Genesizadmin\GenesizCore\Domain\UI\HasOptions;

class RadioGroup extends FormInput {

    use HasOptions;

    protected $component = 'a-radio-group';
}
