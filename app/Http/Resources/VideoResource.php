<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            "videoUrl" => $this->video_url,
            "videoDescription" => $this->description,
            "comments" => !is_null(CommentResource::collection($this->whenLoaded("comments"))) ? CommentResource::collection($this->whenLoaded("comments")) : null,
            "userId" => $this->user
        ];
    }
}
