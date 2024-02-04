<?php

namespace App\Http\Controllers;

use App\Models\TrainingPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class TrainingPlanController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            ['training-plans' => TrainingPlan::with('exercices')->get()],
            200
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TrainingPlan $trainingPlan)
    {
        //
    }

    public function update(Request $request, TrainingPlan $trainingPlan)
    {
        //
    }

    public function destroy(TrainingPlan $trainingPlan)
    {
        //
    }
}
