<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
             "comment" => $this->comment,
             "commenter" => $this->user_id,
             "commentableType" => $this->commentable_type,
             "commentableId" => $this->commentable_id 
        ];
    }
}
