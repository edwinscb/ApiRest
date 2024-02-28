<?php

namespace App\Http\Resources;

use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "startedProject" => $this->started_project,
            "stateId" => $this->state_id,
            "createdById" => $this->created_by_id,
            "AssignedUserHistories" => UserHistoryResource::collection($this->whenLoaded("userHistories")),

        ];
    }
}
