<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionsCreatedRequest extends FormRequest
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
            'name' => 'required|max:40'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '昵称'
        ];
    }
}
