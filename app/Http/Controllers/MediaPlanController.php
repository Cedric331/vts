<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaPlanRequest;
use App\Http\Resources\MediaPlan\MediaPlanCollection;
use App\Http\Resources\MediaPlan\MediaPlanResource;
use App\Models\MediaPlan;

class MediaPlanController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return MediaPlanCollection::collection(MediaPlan::all());
    }

    /**
     * @param MediaPlanRequest $request
     * @return \Illuminate\Http\Response|MediaPlanResource
     */
    public function store(MediaPlanRequest $request): \Illuminate\Http\Response|MediaPlanResource
    {
        $validatedData = $request->validated();

        $mediaPlan = MediaPlan::create($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    /**
     * @param MediaPlan $mediaPlan
     * @return MediaPlanResource
     */
    public function show(MediaPlan $mediaPlan): MediaPlanResource
    {
        return new MediaPlanResource($mediaPlan);
    }

    /**
     * @param MediaPlanRequest $request
     * @param MediaPlan $mediaPlan
     * @return \Illuminate\Http\Response|MediaPlanResource
     */
    public function update(MediaPlanRequest $request, MediaPlan $mediaPlan): \Illuminate\Http\Response|MediaPlanResource
    {
        $validatedData = $request->validated();

        $mediaPlan->update($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    /**
     * @param MediaPlan $mediaPlan
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(MediaPlan $mediaPlan): \Illuminate\Http\JsonResponse
    {
        $deleted = $mediaPlan->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Media Plan supprimé avec succès'
            ]);
        }
        return response()->json([
            'message' => 'Erreur lors de la suppression du Media Plan'
        ], 500);
    }
}
