<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLikeRequest extends FormRequest
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
            "userId" => ["required"],
            "likableId" => ["required"],
            "likableType" => ["required"],

        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            "user_id" => $this->userId,
            "likable_type" => $this->likableType,
            "likable_id" => $this->likableId,

        ]);
    }
}

