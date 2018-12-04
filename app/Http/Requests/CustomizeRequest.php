<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomizeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 判斷使用者是否有權限做出此請求。
     * 錯誤回傳403
     *
     * @return bool
     */
    public function authorize()
    {
        //若沒有寫身份驗證或是其他的驗證規則的話要設定true(預設false)
        if(true) { //可以寫一些權限方面的驗證
            return true;
        }else {
            return false;
        }
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

    /**
     * rule驗證完之後的動作可以寫在withValidator內
     * （為表單請求加上驗證後的掛勾）
     *
     * @param \Illuminate\Validation\Validator $validator
     */
    public function withValidator($validator) {
        //如果驗證失敗，則新增一個錯誤訊息
        if($validator->fails()) {
            $validator->after(function ($validator) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            });
        };
    }

    /**
     * 取得已定義驗證規則的錯誤訊息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '此欄位必填',
            'name.max' => '不能超過五個字',
            'int.required' => '此欄位必填',
            'int.integer' => '要填數字'
        ];
    }
}
