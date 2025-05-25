<?php
namespace App\Http\Controllers;

use App\Models\BaseModel;
use App\Models\TimeSlot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = TimeSlot::where(BaseModel::IS_AVAILABLE, 1);

        if ($request->has(BaseModel::DOCTOR_ID)) {
            $query->where(BaseModel::DOCTOR_ID, $request->doctor_id);
        }

        return response()->json($query->get());
    }
}
