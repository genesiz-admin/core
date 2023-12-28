<?php
namespace Genesizadmin\GenesizCore\Domain\UI;

use Genesizadmin\GenesizCore\Domain\Enums\Alignment;

trait HasAlignment {

    use HasInlineAttributes;

    public function setAlignment(Alignment $value)
    {
        $this->setAttribute('align',$value->value);
        return $this;
    }

    public function alignLeft()
    {
        $this->setAlignment(Alignment::LEFT);
        return $this;
    }

    public function alignRight()
    {
        $this->setAlignment(Alignment::RIGHT);
        return $this;
    }
    public function alignCenter()
    {
        $this->setAlignment(Alignment::CENTER);
        return $this;
    }
}
