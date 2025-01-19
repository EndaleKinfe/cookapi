<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "userId" => $this->user_id,
            "firstName" => $this->first_name,
            "lastName" => $this->last_name,
            "phoneNumber" => $this->phone_number,
            "birthday" => $this->birthday,
            "gender" => $this->gender,
            "city" => $this->city,
            "country" => $this->country,
            "bio" => $this->bio
        ];
    }
}
