<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;
use Genesizadmin\GenesizCore\Domain\UI\HasAlignment;
use Genesizadmin\GenesizCore\Domain\UI\HasInlineAttributes;

class Column
{

    use HasAlignment, HasInlineAttributes;

    private Closure $rowFormatter;
    private Closure $colCallback;
    private  $actions;
    private string $component = "span";
    private array $componentAttrs = [];

    public static function make(string $name, mixed $key = null)
    {
        return new static($name, $key);
    }

    public function __construct(private string $name, private mixed $key)
    {

        if (is_callable($key)) {
            $this->colCallback = $key;
            $key = str($name)->snake()->toString();
        } else {
            $this->colCallback = fn ($row) => $row[$this->getKey()];
            $key = $key ?? str($name)->snake()->toString();
        }


        $this->setAttribute('key', $key);
        $this->setAttribute('dataIndex', $key);
        $this->setAttribute('title', $name);
        $this->format(fn ($col) => $col);
    }

    public function getKey()
    {
        return $this->getAttribute('key');
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

    public function actions(callable $callback)
    {
        $this->setAttribute('type', 'actions');

        $this->actions = $callback;

        return $this;
    }

    public function getActionCallback()
    {
        return $this->actions;
    }

    public function sortable()
    {
        $this->setAttribute('sorter', true);
        return $this;
    }
    public function width(string $value)
    {
        $this->setAttribute('width', $value);
        return $this;
    }

    public function fixeAt(string $value)
    {
        $this->setAttribute('fixed', $value);
        return $this;
    }

    public function type($value)
    {
        $this->setAttribute('type', $value);
        return $this;
    }

    public function asBadge(array $labels, array $colors = null)
    {

        $this->type('tag');
        $this->format(fn ($col) => [
            'attrs' => [
                'color' => $colors[$col] ?? 'green',
                'text' => $labels[$col],
            ],

            'component' => 'a-badge'
        ]);

        return $this;
    }

    public function resolveValue($row)
    {
        return [
            'component' =>  $this->component,
            'text' => call_user_func($this->colCallback, $row),
            'attrs' => $this->componentAttrs,
            'type' => null
        ];
    }

    public function toArray()
    {
        return [
            ...$this->getAttributes(),
        ];
    }

    public function component()
    {
        $this->setAttribute('type', 'component');
        $this->setAttribute('component', 'a-tag');
        $this->setAttribute('attrs', [
            'color' => 'green'
        ]);

        return $this;
    }

    public function asLink()
    {
        $this->component = 'Link';
        $this->componentAttrs = function ($row) {
            return [
                'href' => '#'
            ];
        };

        return $this;
    }
}
