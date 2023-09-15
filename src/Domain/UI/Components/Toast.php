<?php

namespace Genesizadmin\GenesizCore\Domain\UI\Components;

class Toast {

     private static function addToast(string $title, string $message = '', string $type = 'success', bool $alwaysShow = false)
    {
        $toast = [
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'alwaysShow' => $alwaysShow,
        ];

        session()->flash('toast', $toast);
    }

    public static function success($message = 'Success')
    {
        self::addToast($message);
    }

    public static function error($message)
    {
        self::addToast($message, '', 'error');
    }
}
