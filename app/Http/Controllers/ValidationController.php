<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
