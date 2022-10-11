<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'image' => [
                'nullable', // 省略可
                'title', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'max: 2000', // ファイル容量が2000kb以下
                'mimes: jpeg,jpg.png'
            ],
            'body' => ['required', 'max:20000']
        ];
    }
}
