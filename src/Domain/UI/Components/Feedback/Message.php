<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\Feedback;

use Genesizadmin\GenesizCore\Domain\Enums\Placement;
use Genesizadmin\GenesizCore\Domain\Enums\StyleType;
use Genesizadmin\GenesizCore\Domain\UI\HasPlacement;
use Genesizadmin\GenesizCore\Domain\UI\HasStyleType;

class Message {

    use HasStyleType;

    public static function make(string $message,$type = StyleType::Info)
    {
        return new static($message,$type);
    }

    public function __construct(private string $message,$type )
    {
        $this->type = $type;
    }

     public  function show()
    {
        $toast = [
            'content' => $this->message,
            'type' => $this->type,
        ];

        session()->flash('_message', $toast);
    }
}
