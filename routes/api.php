<?php

use App\Models\User;
use Exception;
use Genesizadmin\GenesizCore\Controllers\ModelSearch;
use Genesizadmin\GenesizCore\Exceptions\NoneSearchableColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('genz/search-model', [ModelSearch::class, 'search']);
