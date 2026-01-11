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
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',            
            'company_id' => 'required|exists:companies,id',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|numeric|digits:10',
            'profile_img' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.exists' => 'The selected company is invalid.',
            'profile_img.max' => 'The profile picture must not be larger than 1 MB.',
            'profile_img.mimes' => 'Only PNG and JPEG formats are supported.',
            'phone' => 'Please enter a valid phone number.',
        ];
    }
}
