<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TraingPlanRequest;
use App\Models\TrainingPlan;
use Illuminate\Http\JsonResponse;

class TrainingPlanController extends Controller
{
    private const MESSAGE = 'message';

    public function index(): JsonResponse
    {
        return response()->json(
            ['training-plans' => TrainingPlan::with('exercices')->get()]
        );
    }

    public function store(TraingPlanRequest $request): JsonResponse
    {
        $request = $request->validated();
        $exercices = $request['exercices'];
        unset($request['exercices']);
        $trainingPlan = TrainingPlan::create($request);
        $trainingPlan->exercices()->attach($exercices);

        return response()->json(
            [self::MESSAGE => 'training plan with exercises is successfully created'],
            201
        );
    }

    public function show(int $id): JsonResponse
    {
        $trainingPlan = TrainingPlan::with('exercices')
            ->where('id', $id)
            ->first();
        if (!$trainingPlan instanceof TrainingPlan) {
            return response()->json(
                [self::MESSAGE => 'training plan with id ' . $id . ' is not found'],
                404
            );
        }
        
        return response()->json(['training plan' => $trainingPlan]);
    }

    public function update(TraingPlanRequest $request, int $id): JsonResponse
    {
        $trainingPlan = TrainingPlan::findOrfail($id);
        $request = $request->validated();
        $exercices = $request['exercices'];
        unset($request['exercices']);
        $trainingPlan->update($request);
        $trainingPlan->exercices()->sync($exercices);

        return response()->json([
            self::MESSAGE => 'training plan id ' . $id . ' with exercises is successfully updated',
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $trainingPlan = TrainingPlan::findOrfail($id);
        $trainingPlan->exercices()->detach();
        $trainingPlan->delete();

        return response()->json([
            self::MESSAGE => 'training plan id ' . $id . ' with exercises is successfully deleted',
        ]);
    }
}
