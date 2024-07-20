<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaPlanRequest;
use App\Http\Resources\MediaPlan\MediaPlanCollection;
use App\Http\Resources\MediaPlan\MediaPlanResource;
use App\Models\MediaPlan;

class MediaPlanController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return MediaPlanCollection::collection(MediaPlan::all());
    }

    public function store(MediaPlanRequest $request): \Illuminate\Http\Response|MediaPlanResource
    {
        $validatedData = $request->validated();

        $mediaPlan = MediaPlan::create($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    public function show(MediaPlan $mediaPlan): MediaPlanResource
    {
        return new MediaPlanResource($mediaPlan);
    }

    public function update(MediaPlanRequest $request, MediaPlan $mediaPlan): \Illuminate\Http\Response|MediaPlanResource
    {
        $validatedData = $request->validated();

        $mediaPlan->update($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    public function destroy(MediaPlan $mediaPlan): \Illuminate\Http\JsonResponse
    {
        $deleted = $mediaPlan->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Media Plan supprimé avec succès',
            ]);
        }

        return response()->json([
            'message' => 'Erreur lors de la suppression du Media Plan',
        ], 500);
    }
}
