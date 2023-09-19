<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Menu;



class MenuContainer
{
    public static array $sidebarMenus = [];

    public static function setSidebarMenus($key, $menus)
    {
        self::$sidebarMenus[$key] = $menus;
    }

    public static function getSidebarMenus($key)
    {
        return self::$sidebarMenus[$key];
    }

    public static function appendMenu($key, $menu)
    {
        if (array_key_exists($key, self::$sidebarMenus)) {
            array_push(self::$sidebarMenus[$key], ...$menu);
        }
    }

    public static function prependMenu($key, $menu)
    {
        if (array_key_exists($key, self::$sidebarMenus)) {
            array_unshift(self::$sidebarMenus[$key], ...$menu);
        }
    }

    public static function insertMenu($key, $menu, $index = 0)
    {
        if (array_key_exists($key, self::$sidebarMenus)) {
            array_splice(self::$sidebarMenus[$key], $index, 0, $menu);
        }
    }

    public static function getActiveSidebarMenu()
    {
        return reset(self::$sidebarMenus);
    }
}
