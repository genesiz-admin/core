<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait HasSizes {
    use HasInlineAttributes;

    public function setSize($size)
    {
        $this->setAttribute('size',$size);
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
