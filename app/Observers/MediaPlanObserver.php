<?php

namespace App\Observers;

use App\Models\MediaPlan;

class MediaPlanObserver
{
    /**
     * Handle the MediaPlan "created" event.
     */
    public function created(MediaPlan $mediaPlan): void
    {
        $mediaPlan->name = $mediaPlan->name.' '.now()->format('Y-m-d');
    }

    /**
     * Handle the MediaPlan "updated" event.
     */
    public function updated(MediaPlan $mediaPlan): void
    {
        $mediaPlan->updated_by = auth()->id();
    }

    /**
     * Handle the MediaPlan "deleted" event.
     */
    public function deleted(MediaPlan $mediaPlan): void
    {
        //
    }

    /**
     * Handle the MediaPlan "restored" event.
     */
    public function restored(MediaPlan $mediaPlan): void
    {
        //
    }

    /**
     * Handle the MediaPlan "force deleted" event.
     */
    public function forceDeleted(MediaPlan $mediaPlan): void
    {
        //
    }
}
