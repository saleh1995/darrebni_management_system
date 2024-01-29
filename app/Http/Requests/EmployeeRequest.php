<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'darrebni_id'=>['string','max:255'],
            'first_name'=>['required','string','max:255'],
            'middle_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'phone'=>['required','numeric'],
            'address'=>['required','string','max:255'],
            'email'=>['required','email','unique:coaches'],
            'birth_date'=>['required','date'],
            'image'=>['required','string','max:255'],
            'note'=>['required','string','max:255'],
            'salary'=>['required','numeric'],
            'brunch_id'=>['exists:brunches,id','sometimes','nullable'],
            'specializetion_id'=>['exists:specializetions,id','sometimes','nullable'],

        ];
    }
}
