<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            "postId" => ["required"],
            "violation" => ["required"],
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            "user_id" => $this->userId,
            "post_id" => $this->postId
        ]);
    }


}
