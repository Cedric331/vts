<?php

namespace App\Http\Resources;

use App\Http\Resources\MediaPlan\MediaPlanResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'content' => $this->content,
            'read_at' => $this->read_at,
            'sender' => new UserResource($this->whenLoaded('sender')),
            'media_plan' => new MediaPlanResource($this->whenLoaded('media_plan')),
        ];
    }
}
