<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait HasInlineAttributes {
    private array $inlineAttributes =[];

    public function setAttribute($name,$value)
    {
        $this->inlineAttributes[$name] = $value;
        return $this;
    }

    public function getAttributes()
    {
        return $this->inlineAttributes;
    }

    public function getAttribute($name,$default = null)
    {
        return $this->inlineAttributes[$name] ?? $default;
    }
}
