<?php
namespace Genesizadmin\GenesizCore\Domain\UI;

use Genesizadmin\GenesizCore\Domain\Enums\Placement;

trait HasPlacement {

    private Placement  $placement;

    public function setPlacement(Placement $value)
    {
        $this->placement = $value;
        return $this;
    }

    public function topLeft()
    {
        $this->placement = Placement::TopLeft;
        return $this;
    }

    public function bottomLeft()
    {
        $this->placement = Placement::BottomLeft;
        return $this;
    }

    public function topRight()
    {
        $this->placement = Placement::TopRight;
        return $this;
    }

    public function bottomRight()
    {
        $this->placement = Placement::BottomRight;
        return $this;
    }

    public function top()
    {
        $this->placement = Placement::Top;
        return $this;
    }

    public function bottom()
    {
        $this->placement = Placement::Bottom;
        return $this;
    }
}
