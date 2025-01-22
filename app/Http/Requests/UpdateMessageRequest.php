<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == "PUT") {
            return [
                "senderId" =>  ["required"],
                "receiverId" =>  ["required"],
                "message" => ["required"],
                "messageSeen" =>  ["required"],
            ];
        } else {
            return [
                "senderId" =>  ["sometimes", "required"],
                "receiverId" =>  ["sometimes", "required"],
                "message" => ["sometimes", "required"],
                "messageSeen" =>  ["sometimes", "required"],
            ];
        }
    }
    public function prepareForValidation()
    {
        return $this->merge([
            "user_id" => $this->senderId,
            "receiver_user_id" => $this->receiverId,
            "message_seen" => $this->messageSeen,

        ]);
    }
}
