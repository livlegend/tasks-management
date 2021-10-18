<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string|required',
            'priority'=>'integer|required|unique:tasks,priority',
            'task_time'=>'required|date_format:Y-m-d H:i',
            'project_id'=>'nullable|exists:projects,id'
        ];
    }
}
