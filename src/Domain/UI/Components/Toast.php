<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

class Toast {

     public static function addToast(string $title, string $description = '', string $type = 'default')
    {
        $toast = [
            'message' => $title,
            'description' => $description,
            'type' => $type,
            'placement' =>  config('genesiz-core.toast.placement','topRight'),
            'duration' =>  config('genesiz-core.toast.duration', 3),
        ];

        session()->flash('toast', $toast);
    }
}
