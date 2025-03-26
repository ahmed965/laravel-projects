<?php
namespace App\Http\Controllers;

use App\Models\BaseModel;
use App\Models\TimeSlot;
use Illuminate\Http\JsonResponse;

class TimeSlotController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            TimeSlot::where(BaseModel::IS_AVAILABLE, 1)->get()
        );
    }
}
