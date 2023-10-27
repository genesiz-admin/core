<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder;

class Form {

    private array $attributes;
    private array $configs;
    private bool $isUpdateForm = false;
    private array $defaultValues;

    public function __construct(private string $name, private array $fields)
    {
        $this->attributes['layout'] = 'vertical';
        $this->configs['submitLabel'] = 'Submit';
        $this->configs['resetLabel'] = 'Reset';
        $this->defaultValues = [];
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

    public function submitLabel($label)
    {
        $this->configs['submitLabel'] = $label;
        return $this;
    }

    public function resetLabel($label)
    {
        $this->configs['submitLabel'] = $label;
        return $this;
    }

    public function layout($type)
    {
        $this->attributes['layout'] = $type;
        return $this;
    }

    public function create($url, $method = 'post')
    {
        $this->submitTo($url,$method);
        return $this;
    }

    public function update($url, $method = 'patch')
    {
        $this->submitLabel('Update');
        $this->isUpdateForm = true;
        $this->submitTo($url,$method);
        return $this;
    }

    public function setDefaults(array $values)
    {
        $this->defaultValues = $values;
        return $this;
    }


    public function toArray()
    {
        $fieldsData = array_map(function($f){

            // hide inputs on update form
            if($this->isUpdateForm && $f->hideOnUpdate){
                return null;
            }

            // hide inputs on create form
            if(!$this->isUpdateForm && $f->hideOnCreate){
                return null;
            }

            // dd($f->getComponentName());
            // wrap all component with ROW by default
            if($f->getComponentName() != 'a-row'){
                return Row::wrap([$f])->toArray();
            }

            return $f->toArray();

        }, $this->fields);

        // remove null values
        $fieldsData = array_filter($fieldsData);

        $models = array_column($fieldsData,'name');
        $models = array_fill_keys($models, null);

        // fill default values
        if($this->defaultValues){
            $models = array_merge($models,$this->defaultValues);
        }

        return [
            'configs' => $this->configs,
            'formAttrs' => $this->attributes,
            'model' => $models,
            'components' => $fieldsData
        ];
    }

}
