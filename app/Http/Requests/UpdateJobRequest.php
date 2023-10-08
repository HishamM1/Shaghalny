<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'job_description' => ['required', 'string', 'max:800'],
            'experience' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'salary' => ['required', 'numeric'],
            'type' => ['required'],
        ];
    }
}
