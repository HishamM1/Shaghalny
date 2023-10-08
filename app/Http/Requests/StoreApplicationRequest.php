<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'job_id' => ['required', 'exists:categories,id'],
            'full_name' => ['required', 'string'],
            'number' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'email'],
            'finished_military' => ['required'],
            'about_applier' => ['required', 'max:800'],
            'cv' => ['required', 'max:10024']
        ];
    }
}
