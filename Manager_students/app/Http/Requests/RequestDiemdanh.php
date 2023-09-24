<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDiemdanh extends FormRequest
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
            'start_buoihoc'=> 'required',
            'end_buoihoc'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'hocsinh_name.required' => 'Yêu cầu nhập tên',
            'lop_hs.required' => 'Yêu cầu nhập lớp',
            'start_buoihoc.required' => 'Yêu cầu nhập thời gian bắt đầu học',
            'end_buoihoc.required' => 'Yêu cầu nhập thời gian kết thúc buổi học',
        ];
    }
}
