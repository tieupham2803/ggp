<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image',
            'txtPrice' => 'required|numeric',
            'txtDescription' =>'required'
            // 'txtCateName' => 'required'

            //
        ];
    }
      public function messages(){
        return[
                'txtName.required' => 'Khong duoc de trong ten san pham',
                'txtName.unique' => 'Ten San Pham da ton tai',
                 'sltParent.required' => 'Khong duoc de trong category',
                 'fImage.required' => 'Khong duoc de trong image',


        ];
    }
}
