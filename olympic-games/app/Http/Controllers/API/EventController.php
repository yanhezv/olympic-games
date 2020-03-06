<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => Event::all()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'data'   => Event::find($id)
        ], 200);
    }
}
