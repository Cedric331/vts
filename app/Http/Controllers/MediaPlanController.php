<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaPlan\PatchMediaPlanRequest;
use App\Http\Requests\MediaPlan\PostMediaPlanRequest;
use App\Http\Resources\MediaPlan\MediaPlanCollection;
use App\Http\Resources\MediaPlan\MediaPlanResource;
use App\Models\MediaPlan;
use Illuminate\Support\Facades\Gate;

class MediaPlanController extends Controller
{
    public function index(): MediaPlanCollection
    {
        Gate::authorize('viewAny', MediaPlan::class);

        return new MediaPlanCollection(MediaPlan::all());
    }

    public function store(PostMediaPlanRequest $request): \Illuminate\Http\Response|MediaPlanResource
    {
        Gate::authorize('create', MediaPlan::class);

        $validatedData = $request->validated();
        $validatedData['created_by'] = auth()->id();

        unset($validatedData['updated_by']);

        $mediaPlan = MediaPlan::create($validatedData);

        return new MediaPlanResource($mediaPlan);
    }

    public function show(MediaPlan $mediaPlan): MediaPlanResource
    {
        Gate::authorize('view', $mediaPlan);

        return new MediaPlanResource($mediaPlan);
    }

    public function update(PatchMediaPlanRequest $request, MediaPlan $mediaPlan): \Illuminate\Http\Response|MediaPlanResource
    {
        Gate::authorize('update', $mediaPlan);

        $validatedData = $request->validated();
        unset($validatedData['created_by'], $validatedData['updated_by']);

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
