<?php

namespace App\Http\Resources;

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
            "id" => $this->id,
            "senderId" => $this->user_id,
            "receiverId" => $this->receiver_user_id,
            "message" => $this->message,
            "messageSeen" => $this->message_seen,
            "messageSeenAt"  =>$this->message_seen_at
        ];
    }
}
