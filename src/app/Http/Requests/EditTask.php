<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = parent::rules();

        // in(1,2,3)
        $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rule + [
            'status' => 'require|'.$status_rule,
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item){
            return $item['label'];
        }, Task::STATUS);

        // 配列の要素を結合して文字列に変換する
        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attributesには'.$status_labels.'のいずれかを指定してください',
        ];
    }
}
