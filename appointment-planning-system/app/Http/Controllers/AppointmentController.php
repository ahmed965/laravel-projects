<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BaseModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Appointment::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            BaseModel::DOCTOR_ID     => 'required',
            BaseModel::PATIENT_NAME  => 'required|string',
            BaseModel::PATIENT_EMAIL => 'required|email',
            BaseModel::DATE_TIME     => 'required|required|date_format:Y-m-d H:i:s',
            BaseModel::STATUS        => 'required|in:pending,approved,canceled',
        ]);

        return response()->json(Appointment::create($validated), 201);
    }

    public function show(Appointment $appointment): JsonResponse
    {
        return response()->json($appointment);
    }

    public function update(Appointment $appointment): JsonResponse
    {
        $appointment->status = 'canceled';
        $appointment->save();

        return response()->json($appointment);
    }
}
