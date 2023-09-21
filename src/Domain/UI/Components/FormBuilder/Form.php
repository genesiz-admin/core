<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class Form {

    private array $attributes;
    private array $configs;

    public function __construct(private string $name, private array $fields)
    {
        $this->attributes['layout'] = 'vertical';
    }

    public static function make($name,$fields)
    {
        return new static($name,$fields);
    }

    public function submitTo($url,$method = 'post')
    {
        $this->configs['url'] = $url;
        $this->configs['method'] = $method;

        return $this;
    }

    public function layout($type)
    {
        $this->attributes['layout'] = $type;
        return $this;
    }

    public function toArray()
    {
        $fieldsData = array_map(fn($f) => $f->toArray(), $this->fields);
        $models = array_column($fieldsData,'name');
        $models = array_fill_keys($models, null);

        return [
            'configs' => $this->configs,
            'formAttrs' => $this->attributes,
            'model' => $models,
            'components' => $fieldsData
        ];
    }
}
