<?php

namespace Genesizadmin\GenesizCore\Domain\Format;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class InputOptions {

    private $collection;

    public static function make($collection)
    {
        return new static($collection);
    }

    public function __construct($collection)
    {
        $this->collection = $collection instanceof Collection ? $collection : collect(Arr::wrap($collection));
    }

    public function toArray($value = 'id', $label = 'name')
    {
        return $this->collection->map(function ($itm, $index) use ($value, $label) {

            return [
                'value' => $itm[$value] ?? $index,
                'label' => is_callable($label) ? $label($itm) : $itm[$label] ?? $itm,
            ];
        })->values();
    }
}
