<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\Enums\Placement;
use Genesizadmin\GenesizCore\Domain\Enums\StyleType;
use Genesizadmin\GenesizCore\Domain\UI\HasPlacement;
use Genesizadmin\GenesizCore\Domain\UI\HasStyleType;

class Toast {

    use HasStyleType, HasPlacement;

    private int $duration;

    public static function make(string $message,$description = null)
    {
        return new static($message,$description);
    }

    public function __construct(private string $message,private $description = null)
    {
        $this->placement = config('genesiz-core.toast.placement', Placement::BottomRight);
        $this->duration = config('genesiz-core.toast.duration', 3);
        $this->type = StyleType::Success;
    }


      public function setDuration($value)
    {
        $this->duration = $value;
        return $this;
    }

     public  function show()
    {
        $toast = [
            'message' => $this->message,
            'description' => $this->description,
            'type' => $this->type,
            'placement' =>  $this->placement,
            'duration' =>  $this->duration,
        ];

        session()->flash('toast', $toast);
    }
}
