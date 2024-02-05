<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;

class ColumnAction extends Column
{

    protected string $component = "Link";
    private Closure $actionCallback;




    public function actions(callable $callback)
    {
        $this->setAttribute('type', 'actions');

        $this->actionCallback = $callback;

        return $this;
    }



    public function resolveValue($row)
    {
        $links = call_user_func($this->actionCallback, $row);

        return   array_map(fn ($link) => $link->toArray(), $links);
    }
}
