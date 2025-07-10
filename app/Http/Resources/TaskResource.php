<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'titulo' => $this->title,
            'descripcion' => $this->when($this->description,  $this->description),
            'tags' => $this->when($this->tags,  TagResource::collection($this->tags)),
        ];
    }
}
