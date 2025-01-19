<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFrendRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender' => ["required"],
            "receiver" => ["required"],
            "accepted" => ["required"]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->sender,
            "receiver_user_id" => $this->receiver
        ]);
    }
}
