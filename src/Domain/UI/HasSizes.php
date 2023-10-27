<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait HasSizes {
    public function setSize($size)
    {
        $this->setAttr('size',$size);
        return $this;
    }

    public function sizeSmall()
    {
        $this->setSize('small');
        return $this;
    }

    public function sizeMedium()
    {
        $this->setSize('middle');
        return $this;
    }

    public function sizeLarge()
    {
        $this->setSize('large');
        return $this;
    }
}
