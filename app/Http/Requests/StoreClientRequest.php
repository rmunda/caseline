<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'first_name'      => 'required|regex:/^[a-zA-Z\s]+$/|max:50',
            'middle_name'     => 'nullable|regex:/^[a-zA-Z\s]+$/|max:50',
            'last_name'       => 'required|regex:/^[a-zA-Z\s]+$/|max:50',
            'gender'          => 'required|string|max:10',
            'dob'             => 'required|date|before:today',
            'address_line_1'  => 'required|string|max:100',
            'address_line_2'  => 'nullable|string|max:100',
            'city_town'       => 'required|regex:/^[a-zA-Z\s]+$/|max:50',
            'district'        => 'required|regex:/^[a-zA-Z\s]+$/|max:50',
            'state'           => 'required|string|max:50',
            'pin'             => 'required|regex:/^[0-9]{6}$/'
        ];
    }

    // Optional
    public function messages(): array
    {
        return [
            'first_name.required'     => 'Please enter the first name.',
            'first_name.string'       => 'First name must contain only valid characters.',
            'first_name.max'          => 'First name cannot exceed 50 characters.',

            'middle_name.string'      => 'Middle name must contain only valid characters.',
            'middle_name.max'         => 'Middle name cannot exceed 50 characters.',

            'last_name.required'      => 'Please enter the last name.',
            'last_name.string'        => 'Last name must contain only valid characters.',
            'last_name.max'           => 'Last name cannot exceed 50 characters.',

            'gender.required'         => 'Please select gender.',
            'gender.in'               => 'Selected gender is invalid.',

            'dob.required'            => 'Please enter date of birth.',
            'dob.date'                => 'Date of birth must be a valid date.',
            'dob.before'              => 'Date of birth must be before today.',

            'address_line_1.required' => 'Please enter address line 1.',
            'address_line_1.max'      => 'Address line 1 cannot exceed 100 characters.',

            'address_line_2.max'      => 'Address line 2 cannot exceed 100 characters.',

            'city_town.required'      => 'Please enter city or town.',
            'city_town.max'           => 'City/Town cannot exceed 50 characters.',

            'district.required'       => 'Please enter district.',
            'district.max'            => 'District cannot exceed 50 characters.',

            'state.required'          => 'Please enter state.',
            'state.max'               => 'State cannot exceed 50 characters.',

            'pin.required'            => 'Please enter PIN code.',
            'pin.digits'              => 'PIN code must be exactly 6 digits.',
        ];
    }
}
