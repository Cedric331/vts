<?php

namespace App\Http\Resources\MediaPlan;

use App\Http\Resources\AnnouncerResource;
use App\Http\Resources\CampaignResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaPlanResource extends JsonResource
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
            'objective' => $this->objective,
            'periodicity' => $this->periodicity,
            'periodicity_one' => $this->periodicity_one,
            'budget' => $this->budget,
            'start_date_wish' => $this->start_date_wish,
            'start_date' => $this->start_date,
            'start_date_flexibility' => $this->start_date_flexibility,
            'end_date' => $this->end_date,
            'end_date_flexibility' => $this->end_date_flexibility,
            'end_date_wish' => $this->end_date_wish,
            'campaign_id' => $this->campaign_id,
            'announcer_id' => $this->announcer_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'campaign' => new CampaignResource($this->whenLoaded('campaign')),
            'announcer' => new AnnouncerResource($this->whenLoaded('announcer')),
            'user' => new UserResource($this->whenLoaded('user')),
            'messages' => MessageResource::collection($this->whenLoaded('messages')),
        ];
    }
}
