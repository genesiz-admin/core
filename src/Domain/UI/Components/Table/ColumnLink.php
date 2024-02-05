<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;

class ColumnLink extends Column
{

    protected string $component = "Link";
    private Closure $hrefCallback;


    protected function setup()
    {
        $this->hrefCallback = fn ($row) => $this->resolveText($row);
    }

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
                'href' => call_user_func($this->hrefCallback, $row),
                'target' => '_blank'
            ],
            'type' => null,
            'hasInnerText' => true
        ];
    }
}
