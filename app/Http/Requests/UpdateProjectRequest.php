<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class UpdateProjectRequest extends FormRequest
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
            'name'=>[
                'required',
                Rule::unique('projects')->ignore($this->route('project'))->where(function($query){
                    return $query->where('user_id',$this->user()->id);
                })
            ],
            'thumbnail'=>'image',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'项目名称不能为空',
            'name.unique'=>'项目名称不能重复！'
        ];
    }

    protected function failedValidation(Validator $validator){
        $this->errorBag = 'update-'.$this->route('project');
        parent::failedValidation($validator);
    }
        
    
}
