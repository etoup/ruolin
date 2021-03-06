<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
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
            'nickname' => 'required|max:40',
            'email' => 'required|email',
            'mobile' => 'required|max:11',
            'company' => 'required|max:40',
            'position' => 'required|max:40',
        ];
    }

    public function attributes()
    {
        return [
            'nickname' => '昵称',
            'email'    => '邮箱',
            'mobile'   => '手机',
            'company'  => '公司名称',
            'position' => '职位'
        ];
    }
}
