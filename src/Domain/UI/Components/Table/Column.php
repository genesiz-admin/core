<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;

class Column {

    private Closure $rowFormatter;
    private array $actions = [];
    private bool $sortable = false;
    private string $width = 'auto';
    private string $fixed = '';
    private string $type = 'default';

    public static function make(string $name, ?string $key = null)
    {
        return new static($name,$key);
    }

    public function __construct(private string $name, private ?string $key = null)
    {
        $this->key = $key ?? str($name)->snake;
        $this->format(fn($col) => $col);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function format(Closure $callback)
    {
        $this->rowFormatter = $callback;
        return $this;
    }

    public function getFormatter()
    {
        return $this->rowFormatter;
    }

    public function actions(array $list)
    {
        $this->actions = $list;

        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function sortable()
    {
        $this->sortable = true;
        return $this;
    }
    public function width(string $value)
    {
            $this->width = $value;
            return $this;
    }

    public function fixeAt(string $value)
    {
            $this->fixed = $value;
            return $this;
    }

    public function type($value)
    {
        $this->type = $value;
        return $this;
    }

    public function toArray()
    {
        return [
            'title' => $this->name,
            'dataIndex' => $this->key,
            'key' => $this->key,
            'sorter' => $this->sortable,
            'width' => $this->width,
            'fixed' => $this->fixed,
            'type' => $this->type
        ];
    }
}
