<?php

namespace App\Http\Controllers;

use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomSearchController extends Controller
{
    function index(Request $request)
    {
        $filter = Filter::where('model', true);

        if ($request == ('volvo')) {
            $filter->where('model');
        }

        if ($request == ('VAZ')) {
            $filter->where('model');
        }

        if ($request == ('mercedes')) {
            $filter->where('model');
        }

        if ($request == ('GAZ')) {
            $filter->where('model');
        }

        return $filter->get();

        return redirect('filter', ['filter' => $filter]);

    }
}
