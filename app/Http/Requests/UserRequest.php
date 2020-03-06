<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function rules(){
        return [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,'.$this->input('id'),
            'dob' => 'required|date'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
            'required'=>':attribute không được để trống',
            'min'=> ':attribute không được dưới :min',
            'max'=> ':attribute không được trên :max',

        ]; // cáy đống này là message, rule loz à
    }
    public function attributes()
    {
        return
        [
            'name'=>'Tên Tài Khoản',
            'email'=>'Email',
            'dob' => 'Ngày sinh',
            'password' =>'Password',
        ];
    }
}
