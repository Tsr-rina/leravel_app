<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // リクエストの内容に基づいた権限チェックのために使う
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //  '入力欄'(name属性) => 'ルールを指定'(複数のルールは「|」で区切る)
        return [
            // title属性のところは入力を必須にする,20文字まで
            'title' => 'required|max:20',
        ];
    }
    
    public function attributes()
    {
        return [
            'title'=>'フォルダ名',
        ];
    }
}
