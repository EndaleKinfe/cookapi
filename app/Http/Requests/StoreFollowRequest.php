<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFollowRequest extends FormRequest
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
            'follower' => ["required"],
            "followed" => ["required"]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->follower,
            "receiver_user_id" => $this->followe
        ]);
    }
}
