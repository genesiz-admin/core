<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

trait InteractsWithForm {

    public bool $hideOnUpdate = false;
    public bool $hideOnCreate = false;

    public function hideOnUpdate()
    {
        $this->hideOnUpdate = true;
        return $this;
    }

    public function hideOnCreate()
    {
        $this->hideOnCreate = true;
        return $this;
    }

    public function showIf(callable $callback)
    {
        $value = !call_user_func($callback);
        $this->hideOnCreate = $value;
        $this->hideOnUpdate = $value;

        return $this;
    }
    public function hideIf(callable $callback)
    {
        $value = call_user_func($callback);
        $this->hideOnCreate = $value;
        $this->hideOnUpdate = $value;

        return $this;
    }


}
