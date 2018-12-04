<?php

namespace App\Http\Controllers;

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
}
