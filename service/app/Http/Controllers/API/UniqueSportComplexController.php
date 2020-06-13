<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\UniqueSportComplex;

class UniqueSportComplexController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => UniqueSportComplex::all()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'data'   => UniqueSportComplex::find($id)
        ], 200);
    }
}
