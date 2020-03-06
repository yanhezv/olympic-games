<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Area;

class AreaController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => Area::all()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'data'   => Area::find($id)
        ], 200);
    }
}
