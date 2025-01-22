<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIngredientRequest extends FormRequest
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
                "postId" => ["required"],
                "ingredient" => ["required"],
                "description" => ["required"],
                "amount" => ["required"]
            ];
        } else {
            return [
                "postId" => ["sometimes", "required"],
                "ingredient" => ["sometimes", "required"],
                "description" => ["sometimes", "required"],
                "amount" => ["sometimes", "required"]
            ];
        }
    }

    public function prepareForValidation()
    {
        return $this->merge([
            "post_id" => $this->postId,

        ]);
    }
}
