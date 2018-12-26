<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class UpdateTaskRequest extends FormRequest
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
            'name' => 'required|max:255',
            'project' => [
                'required',
                'integer',
                Rule::exists('projects','id')->whereIn('id',$this->user()->projects()->pluck('id')->toArray()),
            ],
        ];
                
    }

    public function messages(){
        return [
            'name.required'=>'项目名称不能为空！',
            'name.max'=>'项目名称最大字符不能超过255',
            'project.required'=>'项目ID不能为空！',
            'project.integer'=>'项目ID必须为整数',
            'project.exists'=>'项目ID无效'
        ];        
    }

    protected function failedValidation(Validator $validator){
        $this->errorBag = 'update-'.$this->route('task');
        parent::failedValidation($validator);
    }
}
