<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestHocsinh extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hocsinh_name' => 'required',
            'lop_hs' => 'required',
            'mon_hoc' => 'required',
            'Get_tongsohocsinh'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'hocsinh_name.required' => 'Yêu cầu nhập tên',
            'lop_hs.required' => 'Yêu cầu nhập lớp',
            'mon_hoc.required' => 'Yêu cầu chọn tên môn học',
            'Get_tongsohocsinh.required' => 'Yêu cầu nhập tổng số học ssinh',
        ];
    }
}
