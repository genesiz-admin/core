<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class RemoteSelectInput extends FormInput
{

    protected $component = 'a-remote-select';

    public function url($url, $key = 'q')
    {
        $this->setAttr('url', $url);
        $this->setAttr('key', $key);

        return $this;
    }

    public function model($model, $column)
    {
        $url = url("/genz/search-model?column=$column&model=$model");

        $this->url($url);

        return $this;
    }

    public function dependOnFields(...$fields)
    {
        $this->setAttr('dependents', $fields);
        return $this;
    }
}
