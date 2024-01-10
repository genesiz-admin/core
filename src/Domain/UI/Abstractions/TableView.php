<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Abstractions;

use Genesizadmin\GenesizCore\Domain\UI\Components\Table\Table;
use Illuminate\Http\Request;

abstract class TableView
{
    public static function make()
    {
        return (new static())->render();
    }
    public function columns()
    {
        return [];
    }

    public function filters()
    {
        return [];
    }

    public function query()
    {
    }

    public function render()
    {
        return Table::make($this->query())
            ->columns($this->columns())
            ->filterPanel($this->filters())
            ->render();
    }
}
