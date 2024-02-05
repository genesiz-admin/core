<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

class TableAction
{

    private array $data = [];

    public function __construct(string $label)
    {
        $this->data['label'] = $label;
        $this->data['icon'] = null;
        return $this;
    }

    public static function make(string $label)
    {
        return new static($label);
    }

    public function icon(string $name)
    {
        $this->data['icon'] = $name;
        return $this;
    }

    public function url(string $url)
    {
        $this->data['url'] = $url;
        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
