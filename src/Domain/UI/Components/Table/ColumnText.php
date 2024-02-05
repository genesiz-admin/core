<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

class ColumnText extends Column
{
    protected string $component = "span";

    public function resolveValue($row)
    {
        return [
            'component' =>  $this->component,
            'text' => $this->resolveText($row),
            'attrs' => array_merge($this->componentAttrs, call_user_func($this->attrsCallback, $row)),
            'type' => null,
            'hasInnerText' => $this->hasInnerText
        ];
    }
}
