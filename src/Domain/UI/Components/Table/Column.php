<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

class Column {
    public static function make(string $name, ?string $key = null)
    {
        return new static($name,$key);
    }

    public function __construct(private string $name, private ?string $key = null)
    {
        $this->key = $key ?? str($name)->snake;
    }

    public function toArray()
    {
        return [
            'title' => $this->name,
            'dataIndex' => $this->key,
            'key' => $this->key,
            'sorter' => false
        ];
    }
}
