<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TraingPlanRequest;
use App\Models\TrainingPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainingPlanController extends Controller
{
    public function __construct(private TrainingPlan $trainingPlan)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(
            ['training-plans' => TrainingPlan::with('exercices')->get()],
            200
        );
    }

    public function store(TraingPlanRequest $request): JsonResponse
    {
        $request = $request->validated();
        $exercices = $request['exercices'];
        unset($request['exercices']);
        $trainingPlan = $this->trainingPlan->create($request);
        $trainingPlan->exercices()->attach($exercices);

        return response()->json([
            'message' => 'training plan with exercises is successfully added',
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $trainingPlan = TrainingPlan::with('exercices')
            ->where('id', $id)
            ->first();
        if (!$trainingPlan instanceof TrainingPlan) {
            return response()->json(
                ['message' => 'training plan with id ' . $id . ' is not found'],
                404
            );
        }
        return response()->json(['training plan' => $trainingPlan]);
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