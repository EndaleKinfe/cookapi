<?php

namespace App\Http\Resources;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "email" => $this->email,
            "username" => $this->name,
            "info" => !is_null(UserInfo::collection($this->whenLoaded("userinfo"))) ? UserInfo::collection($this->whenLoaded("userinfo")) : null,
        ];
    }
}
