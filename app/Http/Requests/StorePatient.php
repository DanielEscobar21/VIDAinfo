<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest
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
            'name_patient' => 'required',
            'lastname_patient' => 'required',
            'phone_patient' => 'required|max:10',
            'age_patient' => 'required',
            'gender_patient' => 'required',
        ];
    }
}
