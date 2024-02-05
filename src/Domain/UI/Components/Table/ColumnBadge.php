<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components\Table;

class ColumnBadge extends Column
{

    protected string $component = "a-badge";
    private array $colors = [];
    private array $labels = [];

    public function colors(array $colors)
    {
        $this->colors = $colors;
        return $this;
    }

    public function labels(array $labels)
    {
        $this->labels = $labels;
        return $this;
    }

    protected function resolveColumn($row)
    {
        return $row[$this->getKey()];
    }

    protected function resolveText($row)
    {

        return empty($this->labels) ? $this->resolveColumn($row) : $this->labels[$this->resolveColumn($row)];
    }

    private function resolveColor($row)
    {
        return $this->colors[$this->resolveColumn($row)];
    }

    public function resolveValue($row)
    {
        return [
            'component' =>  $this->component,
            'text' => null,
            'attrs' => [
                'text' => $this->resolveText($row),
                'status' => $this->resolveColor($row)
            ],
            'type' => null,
            'hasInnerText' => false
        ];
    }
}
