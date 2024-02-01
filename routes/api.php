<?php

use Genesizadmin\GenesizCore\Controllers\ModelSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('genz/search-model', [ModelSearch::class, 'search']);
