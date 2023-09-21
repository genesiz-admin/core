<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\HasOptions;

class SelectInput extends FormInput {

    use HasOptions;

    protected $component = 'a-select';

}
