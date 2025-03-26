<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\JsonResponse;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Doctor::with('specialization')->get());
    }
}
