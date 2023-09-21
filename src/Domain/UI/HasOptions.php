<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait HasOptions {
    public function options($items)
    {
        if(! is_array($items[array_key_first($items)])){
            $items = $this->formatSingleArray($items);
        }
        $this->setAttr('options',$items);
        return $this;
    }

    private function formatSingleArray($array)
    {
        return collect($array)
        ->map(fn($i,$k) => ['label' => $i , 'value' => $k])
        ->values()
        ->toArray();

    }
}
