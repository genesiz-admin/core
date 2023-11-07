<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Illuminate\Contracts\Pagination\Paginator;

class Table {

    private $columns;

    public static function make($query)
    {
        return new static($query);
    }

    public function __construct(private $query)
    {
        $this->columns = [];
    }

    public function columns(array $columns)
    {
        $this->columns = $columns;
        return $this;
    }

    private function isPaginated():bool
    {
        return $this->query instanceof Paginator;
    }

    public function transformRow($row)
    {
        foreach($this->columns as $col){
            if($col->getFormatter()){
                $row[$col->getKey()] = call_user_func($col->getFormatter(), $row[$col->getKey()]);
            }
        }
        return $row;
    }

    public function render()
    {
        $rows = $this->isPaginated() ? $this->query->items() : $this->query;

        $output =  [
            'data' => array_map(fn($row) => $this->transformRow($row),$rows),
            'columns' => array_map(fn($col) => $col->toArray(),$this->columns),
            'pagination' => false
        ];

        if($this->isPaginated()){
            $output['pagination'] = [
                'total' => $this->query->total(),
                'current' => $this->query->currentPage(),
                'pageSize' => $this->query->perPage()
            ];
        }

        return $output;
    }
}
