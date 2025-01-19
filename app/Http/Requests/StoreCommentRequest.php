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
            "comment" => ["required"],
            "commenter" => ["required"],
            "commentableId" => ["required"],
            "commenableType" => ["required", Rule::in("App\Models\Post", "App\Models\Comment", "App\Models\Video")]
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'user_id' => $this->commenter,
            "commentable_id" => $this->commentableId,
            "commentable_type" => $this->commenableType
        ]);
    }
}
