<?php

namespace App\Http\Controllers;

use App\Models\TrainingPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TraingPlanRequest;

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

    public function store(Request $request): JsonResponse
    {
       $request = $request->all();
       $exercices = $request['exercices'];
       unset($request['exercices']);
       $data =  $this->trainingPlan->create($request);

       $exercices[0]['training_plan_id'] = $data->id;

       $this->trainingPlan->exercices()->attach($exercices);

       return response()->json(['success' => true]);
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
