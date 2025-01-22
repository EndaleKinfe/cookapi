<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
        return [
            "comment" => ["required", "string"],
            "user_id" => ["required"],
            "commentable_id" => ["required"],
            "commentable_type" => ["required", Rule::in("App\\Models\\Post", "App\\Models\\Comment", "App\\Models\\Video")]
        ];
    }
}
