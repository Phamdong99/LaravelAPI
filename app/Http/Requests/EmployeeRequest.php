<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:10|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng điền thông tin tên !',
            'email.required'=>'Vui lòng điền thông tin email !',
            'phone.required'=>'Vui lòng điền thông tin số điện thoại !',
            'phone.min'=>'Vui lòng kiểm tra lại số điện thoại'
        ];
    }
}
