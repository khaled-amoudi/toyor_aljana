<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearRequest extends FormRequest
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
            'name' => 'required|unique:years,name',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'إسم السنة الدراسية مطلوب',
            'name.unique' => 'هذه السنة موجودة مسبقا',
        ];
    }

}
