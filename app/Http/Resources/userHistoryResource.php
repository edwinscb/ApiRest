<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserHistoryResource extends JsonResource
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
            "criteria" => $this->criteria,
            "stateId" => $this->state_id,
            "projectId" => $this->project_id,
            "createdById" => $this->created_by_id,
            "AssignedTasks" => TaskResource::collection($this->whenLoaded("tasks")),

        ];
    }
}
