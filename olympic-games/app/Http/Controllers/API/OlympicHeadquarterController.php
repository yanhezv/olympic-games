<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\OlympicHeadquarter;
use Illuminate\Http\Request;

class OlympicHeadquarterController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data'   => OlympicHeadquarter::all()
        ], 201);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
