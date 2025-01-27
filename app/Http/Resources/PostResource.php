<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "user" => $this->user,
            "title" => $this->title,
            "description" => $this->description,
            "ingredients" => !is_null(IngredientResource::collection($this->whenLoaded("indredients"))) ?IngredientResource::collection($this->whenLoaded("indredients")) : null ,
            "instructions" => !is_null(InstructionResource::collection($this->whenLoaded("instructions"))) ?InstructionResource::collection($this->whenLoaded("instructions")): null,
            "comments" => !is_null(CommentResource::collection($this->whenLoaded("comments"))) ? CommentResource::collection($this->whenLoaded("comments")): "null",
            "images" => !is_null(ImageResource::collection($this->images)) ? ImageResource::collection($this->images) : null,
            "likeCount" => $this->likes_count,
            "commentCount" => $this->comments_count,
            "shareCount" => $this->shares_count
        ];
    }
}
