<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components\Menu;

class NavBar
{
    public static $menuCallback;

    // rename this to make
    public static function build(callable $callback)
    {
        static::$menuCallback = $callback;
    }

    // rename this to render
    public static function execute($request)
    {
        $menuitems =  call_user_func(static::$menuCallback, $request);

        return array_map(function ($el) {
            return $el->toArray();
        }, $menuitems);
    }
}
