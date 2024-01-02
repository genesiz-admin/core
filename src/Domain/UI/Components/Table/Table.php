<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

use Closure;
use Genesizadmin\GenesizCore\Domain\UI\Components\FormBuilder\Form;
use Genesizadmin\GenesizCore\Domain\UI\HasInlineAttributes;
use Genesizadmin\GenesizCore\Domain\UI\HasSizes;
use Illuminate\Contracts\Pagination\Paginator;

class Table {

    use HasInlineAttributes,HasSizes;

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
        $this->setAttribute('bordered',true);
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
            if($col->getAttribute('type') == 'actions'){
                $actions = call_user_func($col->getActionCallback(), $row);
                $tempRow[$col->getKey()] = array_map(fn($el) => $el->toArray(), $actions);
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
            'attrs' => $this->getAttributes(),
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
                'pageSize' => $this->query->perPage(),
                'hasPages' => $this->query->hasPages()
            ];
        }

        return $output;
    }
}
