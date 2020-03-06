<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Equipment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => Equipment::all()
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            DB::beginTransaction();

            $obj = new Equipment([
                "name" => $request->name
            ]);

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al crear equipamiento.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se creó exitosamente el equipamiento.'
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
            'data'   => Equipment::find($id)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            DB::beginTransaction();

            $obj = Equipment::find($id);
            if (is_null($obj)) { throw new Exception("No existe equipamiento.", 1); }

            $obj->name = $request->name;

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar equipamiento.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se actualizó correctamente equipamiento.'
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

            $obj = Equipment::find($id);
            if (is_null($obj)) { throw new Exception("No existe equipamiento.", 1); }

            if ($obj->eventEquipments()->count() > 0) {
                throw new Exception("Imposible eliminar equipamiento.", 1);
            }

            $result = $obj->delete();
            if (!$result) { throw new Exception("Error al eliminar equipamiento.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se eliminó correctamente la equipamiento.'
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
