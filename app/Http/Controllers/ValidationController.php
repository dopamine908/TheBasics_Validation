<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CustomizeRequest;

class ValidationController extends Controller
{
    /**
     * 傳進來的都是單變數的時候的驗證範例
     *
     * @param Request $request
     */
    public function validateInController(Request $request) {
        $validate = $request->validate([
            'id' => 'required|integer',
            'name' => 'required'
        ]);
        dump($validate);
    }

    /**
     * 傳進來的變數為array的時候的驗證範例
     * @param Request $request
     */
    public function validateArrayInController(Request $request) {
        $validate = $request->validate([
            'array.index1' => 'required',
            'array.index2' => 'required'
        ]);
        dump($validate);
    }

    /**
     * 訂製的request post接的function
     * 會先經過CustomizeRequest的驗證
     * @param CustomizeRequest $customizeRequest
     */
    public function costumizeRequest(CustomizeRequest $customizeRequest) {
        dump('CustomizeRequest 驗證成功');
    }

    /**
     * 在controller內製作驗證規則
     * 以及寫驗證失敗的處理
     *
     * @param Request $request
     * @return $this
     */
    public function makeValidateInController(Request $request) {
        //製作驗證規則並驗證
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:5', //必填｜最多五個字
            'int' => 'required|integer' //必填｜只能數字
        ]);

        //驗證失敗執行的動作
//        if ($validator->fails()) {
//            return redirect('寫validate在controller內') //重新導向
//                ->withErrors($validator) //將錯誤訊息帶至redirect的目的地（存在session）
//                ->withInput();
//        }

        //驗證失敗執行的動作
        if ($validator->fails()) {
            return redirect('寫validate在controller內') //重新導向
            ->withErrors($validator, 'MessageBagName') //將錯誤訊息帶至redirect的目的地（存在session）
            ->withInput();
        }

        //也可以直接這樣寫，會重導到預設的route(表單提交頁)
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:5', //必填｜最多五個字
//            'int' => 'required|integer' //必填｜只能數字
//        ])->validate();

    }
}
