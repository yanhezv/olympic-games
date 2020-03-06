<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\SportComplex;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportComplexController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => SportComplex::all()
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'location'               => 'required|string',
                'head_of_organization'   => 'required|string',
                'total_area'             => 'required|numeric',
                'complex_type'           => 'required|string',
                'olympic_headquarter_id' => 'required|numeric'
            ]);

            DB::beginTransaction();

            $obj = new SportComplex([
                "head_of_organization"   => $request->head_of_organization,
                "location"               => $request->location,
                "total_area"             => $request->total_area,
                "complex_type"           => $request->complex_type,
                "olympic_headquarter_id" => $request->olympic_headquarter_id
            ]);

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar la complejo deportivo", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se creó exitosamente el complejo deportivo.'
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
            'data'   => SportComplex::find($id)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'location'               => 'required|string',
                'head_of_organization'   => 'required|string',
                'total_area'             => 'required|numeric',
                'complex_type'           => 'required|string',
                'olympic_headquarter_id' => 'required|numeric'
            ]);

            DB::beginTransaction();

            $obj = SportComplex::find($id);
            if (is_null($obj)) { throw new Exception("No existe complejo deportivo.", 1); }

            $obj->location               = $request->location;
            $obj->head_of_organization   = $request->head_of_organization;
            $obj->total_area             = $request->total_area;
            $obj->complex_type           = $request->complex_type;
            $obj->olympic_headquarter_id = $request->olympic_headquarter_id;

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar complejo deportivo", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se actualizó el complejo deportivo.'
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

            $obj = SportComplex::find($id);
            if (is_null($obj)) { throw new Exception("No existe complejo deportivo.", 1); }

            if ($obj->events()->count() > 0) {
                throw new Exception("Imposible eliminar el complejo deportivo", 1);
            }

            if ($obj->uniqueSportComplexs()->count() > 0) {
                throw new Exception("Imposible eliminar el complejo deportivo", 1);
            }

            if ($obj->sportsCenterComplexs()->count() > 0) {
                throw new Exception("Imposible eliminar el complejo deportivo", 1);
            }

            $result = $obj->delete();
            if (!$result) { throw new Exception("Error al eliminar el complejo deportivo", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se eliminó correctamente el complejo deportivo.'
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
