<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
                "user_id" => ["required"],
                "title" => ["required"],
                "description" => ["required"]
            ];
        } else {
            return [
                "user_id" => ["sometimes", "required"],
                "title" => ["sometimes", "required"],
                "description" => ["sometimes", "required"]
            ];
        }
    }
}
