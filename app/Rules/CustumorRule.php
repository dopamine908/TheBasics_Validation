<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustumorRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     * 試寫一個只能讓偶數通過的規則
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (int)$value % 2 == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute 只能輸入偶數';
    }

    /**
     * 取得驗證錯誤訊息。
     * 如果想要從翻譯檔中取回錯誤訊息，也可以在 message 方法中呼叫 trans 輔助函式。
     *
     * @return string
     */
//    public function message()
//    {
//        return trans('validation.uppercase');
//    }
}
