<?php
namespace Genesizadmin\GenesizCore\Domain\Enums;

enum Placement:string {
    case TopRight = 'topRight';
    case BottomRight = 'bottomRight';
    case BottomLeft = 'bottomLeft';
    case TopLeft = 'topLeft';
    case Top = 'top';
    case Bottom = 'bottom';
}
