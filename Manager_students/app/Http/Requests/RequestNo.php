<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNo extends FormRequest
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
            'name_hs' => 'required',
            'nobaonhieu_hs' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_hs.required' => 'Yêu cầu nhập tên học sinh',
            'nobaonhieu_hs.required' => 'Yêu cầu nhập số tiền nợ',
        ];
    }
}
