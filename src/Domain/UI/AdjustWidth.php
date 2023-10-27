<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait AdjustWidth {

    public function width($value)
    {
        $this->setAttr('col-span',$value);
        return $this;
    }

    public function widthHalf()
    {
        $this->width('50%');
        return $this;
    }

    public function widthFull()
    {
        $this->width('100%');
        return $this;
    }
}
