<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaPlanRequest;
use App\Http\Resources\MediaPlan\MediaPlanCollection;
use App\Http\Resources\MediaPlan\MediaPlanResource;
use App\Models\MediaPlan;
use Illuminate\Support\Facades\Gate;

class MediaPlanController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // Policy check
        Gate::authorize('viewAny', MediaPlan::class);

        return MediaPlanCollection::collection(MediaPlan::all());
    }

    public function store(MediaPlanRequest $request): \Illuminate\Http\Response|MediaPlanResource
    {
        Gate::authorize('create', MediaPlan::class);

        $validatedData = $request->validated();

        $mediaPlan = MediaPlan::create($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    public function show(MediaPlan $mediaPlan): MediaPlanResource
    {
        Gate::authorize('view', $mediaPlan);

        return new MediaPlanResource($mediaPlan);
    }

    public function update(MediaPlanRequest $request, MediaPlan $mediaPlan): \Illuminate\Http\Response|MediaPlanResource
    {
        Gate::authorize('update', $mediaPlan);

        $validatedData = $request->validated();

        $mediaPlan->update($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    public function destroy(MediaPlan $mediaPlan): \Illuminate\Http\JsonResponse
    {
        Gate::authorize('delete', $mediaPlan);

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
