<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomizeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //若沒有寫身份驗證或是其他的驗證規則的話要設定true(預設false)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 驗證規則
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:5', //必填｜最多五個字
            'int' => 'required|integer' //必填｜只能數字
        ];
    }
}
