<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
                "imageUrl" => ["required"],
                "imagableId" => ["required"],
                "imagableType" => ["required"],
            ];
        } else {
            return [
                "imageUrl" => ["sometimes", "required"],
                "imagableId" => ["sometimes", "required"],
                "imagableType" => ["sometimes", "required"],
            ];
        }
    }

    public function prepareForValidation()
    {
        return $this->merge([
            "imagable_id" => $this->imagableId,
            "imagable_type" => $this->imagableType,
            "imagable_url" => $this->imagableUrl,

        ]);
    }
}
