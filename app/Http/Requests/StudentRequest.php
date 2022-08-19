<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'name' => 'required|max:100',
            // 'idNumber' => 'required|numeric|unique:students,idNumber',
            'idNumber' => ['required', 'numeric', Rule::unique('students')->ignore($this->id, 'id')],
            'birthday' => 'required|date',
            'stage' => 'required',
            'fastTest' => 'required|numeric',
            'gender' => 'required|boolean',
            'room_id' => 'required',
            'location' => 'required',
            'phone' => 'required|numeric',
            'year_id' => 'required',
            'fatherIdNumber' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الطالب مطلوب',
            'name.max' => 'الاسم لا يجب أن يتعدى ال 100 حرف',
            'idNumber.required' => 'رقم هوية الطالب مطلوبة',
            'idNumber.numeric' => 'رقم هوية الطالب يجب ان تتكون من أرقام فقط',
            'idNumber.unique' => 'رقم الهوية موجود مسبقا',
            'birthday.required' => 'تاريخ الميلاد مطلوب',
            'stage.required' => 'المرحلة الدراسية مطلوبة',
            'fastTest.required' => 'الإختبار السريع مطلوب ',
            'gender.required' => 'تحديد الجنس مطلوب',
            'room_id.required' => 'اسم الصف مطلوب',
            'location.required' => 'عنوان السكن مطلوب',
            'phone.required' => 'رقم الهاتف المحمول مطلوب',
            'phone.numeric' => 'رقم الهاتف المحمول يجب ان يتكون من أرقام فقط',
            'year_id.required' => 'تحديد السنة الدراسية مطلوب',
            'fatherIdNumber.required' => 'رقم هوية ولي الأمر مطلوبة',
            'fatherIdNumber.numeric' => 'رقم هوية ولي الأمر يجب ان تتكون من أرقام فقط',
        ];
    }

}
