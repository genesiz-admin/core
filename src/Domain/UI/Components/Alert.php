<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

use Genesizadmin\GenesizCore\Domain\Enums\StyleType;
use Genesizadmin\GenesizCore\Domain\UI\HasStyleType;
use Genesizadmin\GenesizCore\Domain\UI\WithInertia;

class Alert {

    use WithInertia, HasStyleType;

    private bool $closable = false, $banner = false;

    public static function make(string $message, ?string $description = null)
    {
            return new static($message,$description);
    }

    public function __construct(private string $message,private ?string $description = '')
    {
        $this->setType(StyleType::Info);
    }

    public function closeable($value = true)
    {
        $this->closable = $value;
        return $this;
    }

     public function asBanner($value = true)
    {
        $this->banner = $value;
        return $this;
    }

    public function show()
    {
        self::mergeShareData('_alert',[
            'message' => $this->message,
            'description' => $this->description,
            'closable' => $this->closable,
            'type' => $this->type,
            'banner' => $this->banner
        ]);
    }

}
