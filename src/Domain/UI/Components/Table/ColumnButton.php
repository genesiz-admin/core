<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;

class ColumnButton extends Column
{

    protected string $component = "a-button";
    private Closure $hrefCallback;

    public function href(Closure $callback)
    {
        $this->hrefCallback = $callback;;
        return $this;
    }

    public function resolveValue($row)
    {
        return [
            'component' =>  $this->component,
            'text' => $this->resolveText($row),
            'attrs' => [

            ],
            'type' => null,
            'hasInnerText' => true
        ];
    }
}
