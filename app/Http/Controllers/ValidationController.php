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
//        if ($validator->fails()) {
//            return redirect('寫validate在controller內') //重新導向
//            ->withErrors($validator, 'MessageBagName') //將錯誤訊息帶至redirect的目的地（存在session）
//            ->withInput();
//        }

        //也可以直接這樣寫，會重導到預設的route(表單提交頁)
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:5', //必填｜最多五個字
//            'int' => 'required|integer' //必填｜只能數字
//        ])->validate();

        //驗證後的動作掛鉤
        $validator->after(function ($validator) { //施驗後要做的事情
            $validator->errors()->add('field', 'Something is wrong with this field!');
        });

        if ($validator->fails()) { //如果驗證結果失敗
            return redirect('寫validate在controller內') //重新導向
                ->withErrors($validator) //將錯誤訊息帶至redirect的目的地（存在session）
                ->withInput();
        }

    }

    /**
     * 自訂錯誤訊息or修改預設訊息
     *
     * @param Request $request
     * @return $this
     */
    public function costumizeErrorMessage(Request $request) {
        $input = $request->all();
        $rules = [ //規則
            'name' => 'required|max:5', //必填｜最多五個字
            'int' => 'required|integer' //必填｜只能數字
        ];
        $messages = [ // 訊息
//            'name.required' => '此欄位必填', //被validation.php內的設定覆蓋
            'name.max' => ':attribute 不能超過五個字',
//            'int.required' => '此欄位必填', //被validation.php內的設定覆蓋
            'int.integer' => ':attribute 要填數字',

            'attributes' => [
                'int' => '數字欄位',
                'name' => '名字欄位'
            ],

        ];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) { //如果驗證結果失敗
            return redirect('自訂錯誤訊息or修改預設訊息') //重新導向
            ->withErrors($validator) //將錯誤訊息帶至redirect的目的地（存在session）
            ->withInput();
        }
    }

    /**
     * 依條件增加規則
     *
     * @param Request $request
     * @return $this
     */
    public function addingRulesConditionally(Request $request) {
        //若有額外輸入
        $add_request = array_merge($request->all(), ['add_sting' => 'qwertyyuuii']);
        //原始request
        $request = $request->all();
        $validator = Validator::make(/*$request*/ $add_request, [
            'name' => 'required|max:5', //必填｜最多五個字
            'int' => 'required|integer', //必填｜只能數字
            'add_sting' => 'sometimes|required|max:7' //sometimes只有在有輸入的時候才會作用
        ]);
        if ($validator->fails()) { //如果驗證結果失敗
            return redirect('依條件增加規則') //重新導向
            ->withErrors($validator) //將錯誤訊息帶至redirect的目的地（存在session）
            ->withInput();
        }
    }

    /**
     * 可以寫較複雜的驗證規則
     * 例如去資料去看看有沒有某資料在確定他會不會過之類的
     *
     * @param Request $request
     * @return $this
     */
    public function complexValidatorRule(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:5', //必填｜最多五個字
            'int' => 'required|integer' //必填｜只能數字
        ]);

        $validator = $validator->sometimes('complex', 'required', function($input) {
            //可在裡面寫更複雜的規則
            return $input->int>100;
        });

        if ($validator->fails()) { //如果驗證結果失敗
            return redirect('較為複雜的驗證規則') //重新導向
            ->withErrors($validator) //將錯誤訊息帶至redirect的目的地（存在session）
            ->withInput();
        }
    }
}
