<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender_id'     => 'required|exists:genders,id',
            'district_id'   => 'required|exists:districts,id',
            'pality_id'     => 'required|exists:palities,id',
            'name'          => 'required|string|max:255',
            'phone_number'  => 'required|digits:10|unique:patients,phone_number,' . $this->route('patient')->id,
            'description'   => 'nullable|string',
            'hubbies'       => 'nullable|array',
            'hubbies.*'     => 'exists:hubbies,id',
        ];
    }
}
