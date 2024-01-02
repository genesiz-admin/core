<?php
namespace Genesizadmin\GenesizCore\Exceptions;
use Exception;

class NoneSearchableColumn extends Exception {

    public function render($request)
    {
        return "Column is not in  searchable array.";
    }
}
