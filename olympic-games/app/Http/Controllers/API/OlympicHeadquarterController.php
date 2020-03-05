<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\OlympicHeadquarter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OlympicHeadquarterController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => OlympicHeadquarter::all()
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'                => 'required|string',
                'location'            => 'required|string',
                'number_of_complexes' => 'required|numeric',
                'budget'              => 'required|numeric'
            ]);

            DB::beginTransaction();

            $obj = new OlympicHeadquarter([
                "name"                => $request->name,
                "location"            => $request->location,
                "number_of_complexes" => $request->number_of_complexes,
                "budget"              => $request->budget
            ]);

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar la sede olimpíca", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se creó exitosamente la sede olímpica.'
            ], 200);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        return response()->json([
            'data'   => OlympicHeadquarter::find($id)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'                => 'required|string',
                'location'            => 'required|string',
                'number_of_complexes' => 'required|numeric',
                'budget'              => 'required|numeric'
            ]);

            DB::beginTransaction();

            $obj = OlympicHeadquarter::find($id);
            if (is_null($obj)) { throw new Exception("No existe sede olímpica.", 1); }

            $obj->name                = $request->name;
            $obj->location            = $request->location;
            $obj->number_of_complexes = $request->number_of_complexes;
            $obj->budget              = $request->budget;

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar la sede olimpíca", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se actualizó correctamente la sede olímpica.'
            ], 200);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $obj = OlympicHeadquarter::find($id);
            if (is_null($obj)) { throw new Exception("No existe sede olímpica.", 1); }

            $result = $obj->delete();
            if (!$result) { throw new Exception("Error al eliminar la sede olimpíca", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se eliminó correctamente la sede olímpica.'
            ], 200);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
