<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //
            'title' => 'required|max:255|min:6',
            'content' => 'required',
            'cate_id' => 'required|numeric'

        ];
    }
    public function messages()
    {
        return[
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được dưới :min',
            'max' => ':attribute không được trên :max',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tên Bài Viết',
            'content' => 'Nội Dung'
        ];
    }
}
