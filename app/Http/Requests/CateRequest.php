<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            //
            'txtCateName'=> 'required|unique:cates,name',
            'txtOrder' => 'numeric'
        ];
    }
    public function messages(){
        return [
                'textCateName.required' => 'Khong duoc de trong Cate Name',
                'txtCateName.unique' => 'Cate name da ton tai'
        ];
    }
}
