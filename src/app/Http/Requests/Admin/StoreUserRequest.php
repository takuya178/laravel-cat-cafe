<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => [
                'required',
                'title', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'max: 2000', // ファイル容量が2000kb以下
                'mimes: jpeg,jpg.png'
            ],
            'introduction' => ['required', 'string', 'max:255'],
        ];
    }

    // 属性名の翻訳
    public function attributes()
    {
        return [
            'introduction' => '自己紹介'
        ];
    }
}
