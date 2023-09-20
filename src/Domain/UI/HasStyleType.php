<?php
namespace Genesizadmin\GenesizCore\Domain\UI;

use Genesizadmin\GenesizCore\Domain\Enums\StyleType;

trait HasStyleType{

    private StyleType $type;

    public function setType(StyleType $type)
    {
        $this->type = $type;

        return $this;
    }

    public function success()
    {
        $this->setType(StyleType::Success);
        return $this;
    }

    public function info()
    {
        $this->setType(StyleType::Info);
        return $this;
    }

    public function error()
    {
        $this->setType(StyleType::Error);
        return $this;
    }

    public function warning()
    {
        $this->setType(StyleType::Warning);
        return $this;
    }
}
