<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

class Banner
{
    private array $data = [];

    public function __construct(string $message, string $style)
    {
        $this->data['message'] = $message;
        $this->data['style'] = $style;
    }

    public static function make(string $message, $style)
    {
        return new static($message, $style);
    }

    public function positiveAction(string $link, $label = 'Ok')
    {
        $this->data['positiveAction'] = $link;
        $this->data['positiveText'] = $label;

        return $this;
    }

    public function negativeAction(string $link, $label = 'Cancel')
    {
        $this->data['negativeAction'] = $link;
        $this->data['negativeText'] = $label;

        return $this;
    }

    public function icon($icon)
    {
        $this->data['icon'] = $icon;

        return $this;
    }

    public function show(): void
    {
        inertia()->share('_banner', $this->data);
    }
}
