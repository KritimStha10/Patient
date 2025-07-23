<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
        'phone_number'  => 'required|digits:10|unique:patients,phone_number',
        'description'   => 'nullable|string',
        'hubbies'       => 'nullable|array',
        'hubbies.*'     => 'exists:hubbies,id',
        ];
    }

    public function messages(): array
    {
        return [
            'gender_id.required'     => 'Please select gender.',
            'gender_id.exists'       => 'The selected gender is invalid.',

            'district_id.required'   => 'Please select district.',
            'district_id.exists'     => 'The selected district is invalid.',

            'pality_id.required'     => 'Please select pality.',
            'pality_id.exists'       => 'The selected pality is invalid.',

            'name.required'          => 'Name is required.',
            'name.string'            => 'Name must be a string.',
            'name.max'               => 'Name cannot exceed 255 characters.',

            'phone_number.required'  => 'Phone number is required.',
            'phone_number.digits'    => 'Phone number must be exactly 10 digits.',
            'phone_number.unique'    => 'This phone number is already taken.',

            'hubbies.*.exists'       => 'One or more selected hobbies are invalid.',
        ];
    }
}
