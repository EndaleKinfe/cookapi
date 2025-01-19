<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserInfoRequest extends FormRequest
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
            "userId" =>["required"],
            "firstName" => ["required"],
            "lastName" => ["required"],
            "phoneNumber" => ["required"],
            "birthday" => ["required"],
            "gender" => ["required"],
            "city" => ["required"],
            "country"=> ["required"],
            "bio" => ["sometimes","required"],
        ];
    }
    public function prepareForValidation()
    {
        return $this->merge([
            "user_id" => $this->userId,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "phone_number" => $this->phoneNumber,
        ]);
    }
}
