<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\SportsCenterComplex;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportsCenterComplexController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => SportsCenterComplex::all()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'data'   => SportsCenterComplex::find($id)
        ], 200);
    }
}
