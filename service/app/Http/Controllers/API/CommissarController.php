<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Commissar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommissarController extends Controller
{
    public function index()
    {
        return response()->json([
            'data'   => Commissar::all()
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            DB::beginTransaction();

            $obj = new Commissar([
                "name" => $request->name,
            ]);

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al crear comisario.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se creó exitosamente el comisario.'
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
            'data'   => Commissar::find($id)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);

            DB::beginTransaction();

            $obj = Commissar::find($id);
            if (is_null($obj)) { throw new Exception("No existe comisario.", 1); }

            $obj->name = $request->name;

            $result = $obj->save();
            if (!$result) { throw new Exception("Error al actualizar comisario.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se actualizó datos del comisario.'
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

            $obj = Commissar::find($id);
            if (is_null($obj)) { throw new Exception("No existe comisario.", 1); }

            if ($obj->commissarEvents()->count() > 0) {
                throw new Exception("Imposible eliminar el comisario", 1);
            }

            $result = $obj->delete();
            if (!$result) { throw new Exception("Error al eliminar comisario.", 1); }

            DB::commit();

            return response()->json([
                'message' => 'Se eliminó datos del comisario.'
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
