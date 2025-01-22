<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFrendRequestRequest extends FormRequest
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
                'sender' => ["required"],
                "receiver" => ["required"],
                "accepted" => ["required"]
            ];
        } else {
            return [
                'sender' => ["sometimes", "required"],
                "receiver" => ["sometimes", "required"],
                "accepted" => ["sometimes", "required"]
            ];
        }

    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->sender,
            "receiver_user_id" => $this->receiver
        ]);
    }
}
