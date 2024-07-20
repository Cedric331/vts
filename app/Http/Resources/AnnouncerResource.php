<?php

namespace App\Http\Resources;

use App\Http\Resources\MediaPlan\MediaPlanResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'media_plans' => MediaPlanResource::collection($this->whenLoaded('media_plans')),
        ];
    }
}
