<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTaskRequest extends FormRequest
{
    protected $errorBag = 'create';
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
            'project_id' => [
                'required',
                'integer',
                Rule::exists('projects','id')->where(function($query){
                    $query->whereIn('id',$this->user()->projects()->pluck('id'));
                })
            ],
        ];
    }

    public function messages(){
        return [
            'name.required'=>'项目名称不能为空！',
            'name.max'=>'项目名称最大字符不能超过255',
            'project_id.required'=>'项目ID不能为空！',
            'project_id.integer'=>'项目ID必须为整数',
            'project_id.exists'=>'项目ID无效'
        ];
        
    }
}
