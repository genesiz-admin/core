<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

use Genesizadmin\GenesizCore\Domain\UI\AdjustWidth;
use Genesizadmin\GenesizCore\Domain\UI\HasOptions;

class SelectInput extends FormInput {

    use HasOptions;

    protected $component = 'a-select';


    public function asTags()
    {
        $this->setAttr('mode','tags');
        return $this;
    }

    public function tokenSeparators(...$values)
    {
        $this->setAttr('token-separators',$values);
        return $this;
    }

    public function multiple()
    {
        $this->setAttr('mode','multiple');
        return $this;
    }

    public function showSearch()
    {
        $this->setAttr('show-search', true);
        return $this;
    }

    /**
     * Change the select dropdown popup placement
     * @param string $placement supports "topleft", "topRight" , "bottomLeft", "bottomRight"
     * @return $this
     */
    public function popupPlacement(string $placement)
    {
        $this->setAttr('placement', $placement);
        return $this;
    }

    public function maxTagCount($count)
    {
        $this->setAttr('max-tag-count',$count);
        return $this;
    }

    public function returnWithLabel()
    {
        $this->setAttr('label-in-value',true);
        return $this;
    }



}
