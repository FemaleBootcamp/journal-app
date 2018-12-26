<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|unique:posts|max:500',
            'plan_tomorrow' => 'required|max:250',
            'goal_tomorrow' => 'required|max:100',
            'goal_status' => 'required'
        ];
    }
}
