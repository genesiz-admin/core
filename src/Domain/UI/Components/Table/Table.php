<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;
use Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder\Form;
use Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder\NumberInput;
use Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder\SelectInput;
use Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder\TextInput;
use Illuminate\Contracts\Pagination\Paginator;

class Table {

    private $columns;
    private $actionCallback;
    private array $filterViewInputs = [];

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
        $tempRow = [];

        foreach($this->columns as $col){
            if($col->getFormatter()){
                $tempRow[$col->getKey()] = call_user_func($col->getFormatter(), $row[$col->getKey()]);
            }
        }


        // set row actions
        if($this->actionCallback){
            $tempRow['actions'] = call_user_func($this->actionCallback, $row);
        }

        return $tempRow;
    }

    public function actions(Closure $callback)
    {
        $this->actionCallback = $callback;
        return $this;
    }

    public function filterPanel(array $inputs)
    {
        $this->filterViewInputs = array_map(fn($inp) => $inp->wrapKeyName('filter'),$inputs);
        return $this;
    }

    public function render()
    {

        $rows = $this->isPaginated() ? $this->query->items() : $this->query;

        $output =  [
            'data' => array_map(fn($row) => $this->transformRow($row),$rows),
            'columns' => array_map(fn($col) => $col->toArray(),$this->columns),
            'pagination' => false,
            'filters' => Form::make('filters', $this->filterViewInputs)
                ->submitLabel('Apply')
                ->submitTo(request()->url(),'get')
                ->setDefaults(request()->collect('filter',[])->mapWithKeys(fn($e,$k) => ["filter[$k]" => $e])->toArray())
                ->hideResetButton()
                ->toArray()
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
