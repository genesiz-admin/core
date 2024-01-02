<?php

namespace Genesizadmin\GenesizCore\Controllers;

use Genesizadmin\GenesizCore\Exceptions\NoneSearchableColumn;
use Illuminate\Http\Request;

class ModelSearch
{
    public function search(Request $request)
    {
        $model = $request->query('model');

        $key = 'name';

        if (!in_array($key, app($model)->searchable)) {
            throw  new NoneSearchableColumn();
        }

        $data =  $model::where($key, 'like', '%' . $request->query('q') . '%')->take(10)->get();

        return $data->map(fn ($el) => [
            'label' => $el[$key],
            'value' => $el['id'],
        ]);
    }
}
